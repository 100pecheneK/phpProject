<?php

require 'vendor/autoload.php';

$payPal = new \test\app\PaymentServices\PayPal();
$visa = new \test\app\PaymentServices\Visa();

$paymentService = new \test\app\PaymentService();

$paymentService->payment($payPal);
$paymentService->payment($visa);