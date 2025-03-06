<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'photo'];

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }
}
