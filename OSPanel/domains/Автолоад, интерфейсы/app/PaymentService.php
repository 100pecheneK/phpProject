<?php

namespace test\app;

use test\app\PaymentServices\PaymentSystemInterface;

class PaymentService
{
    public function payment(PaymentSystemInterface $service)
    {
        $service->payment();
    }
}