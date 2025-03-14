<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MortgageRequest extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'house_id', 'interest_id', 'duration', 'house_price', 'bank_name',
        'interest', 'dp_total_amount', 'dp_percentage', 'loan_total_amount',
        'loan_interest_total_amount', 'monthly_amount', 'status', 'documents'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function getRemainingLoanAmountAttribute()
    {
        // Check if there are any installments
        if ($this->installments()->count() === 0) {
            // Default to the total loan interest amount if no installments exist
            return $this->loan_interest_total_amount;
        }

        // Calculate the total paid amount from installments
        $totalPaid = $this->installments()
            ->where('is_paid', true)
            ->sum('sub_total_amount');

        // Subtract the total paid from the total loan amount
        return max($this->loan_interest_total_amount - $totalPaid, 0);
    }
}
