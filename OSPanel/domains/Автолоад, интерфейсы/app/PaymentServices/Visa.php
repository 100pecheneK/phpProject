<?php

namespace test\app\PaymentServices;


class Visa implements PaymentSystemInterface
{
    public function payment()
    {
        echo 'Оплачено через Visa';
        echo '<br>';
    }
}