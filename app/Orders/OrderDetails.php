<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetails
{
    private $paymentGatewayContract;

    public function __construct(PaymentGatewayContract $paymentGatewayContract)
    {
        $this->paymentGatewayContract = $paymentGatewayContract ;
    }
    public function all()
    {
        $this->paymentGatewayContract->setDiscount(500);
        return [
            'name' => 'Mido',
            'Address' => '123 code\'s Tap street',
        ];
    }
}
