<?php

namespace test\app\PaymentServices;

class PayPal implements PaymentSystemInterface
{
    public function payment()
    {
        echo 'Оплачено через PayPal';
        echo '<br>';
    }
}