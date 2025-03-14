<?php

namespace App\Services;

class PaymentService {
    
    protected $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }
}