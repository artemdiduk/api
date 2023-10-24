<?php

namespace App\Controller;

use Framework\Api\ApiInterface;
use Framework\Controller\Controller;
use JetBrains\PhpStorm\Pure;
use PaymentApi\src\Controller\PaymentApi;

class MainController extends Controller
{
    public ApiInterface $api;
    public paymentApi $paymentApi;

    #[Pure] public function __construct(ApiInterface $api)
    {
        $this->api = $api;
        $this->paymentApi = new PaymentApi();
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data = [
            'client_key' => '5b6492f0-f8f5-11ea-976a-0242c0a85007',
            'client_pas' => 'd0ec0beca8a3c30652746925d5380cf3',
            'order_id' => "ORDER-" . rand(1, 1000),
            'order_amount' => 2.99,
            'order_currency' => 'USD',
            'order_description' => 'Product',

        ];
        return $this->render('index', $data);
    }

    public function paymentApi(): void
    {
        $this->paymentApi->set(
            [
                'action' => "SALE",
                'term_url_3ds' => 'http://client.site.com/return.php',
                'payer_first_name' => $this->api->input('payer_first_name'),
                'payer_last_name' =>  $this->api->input('surname'),
                'order_id' =>  $this->api->input('order_id'),
                'order_amount' =>  $this->api->input('order_amount'),
                'order_currency' =>  $this->api->input('order_currency'),
                'order_description' =>  $this->api->input('order_description'),
                'payer_middle_name' =>  $this->api->input('payer_middle_name'),
                'payer_birth_date' =>  $this->api->input('payer_birth_date'),
                'payer_address' =>  $this->api->input('payer_address'),
                'payer_address2' =>  $this->api->input('payer_address2'),
                'payer_country' =>  $this->api->input('payer_country'),
                'payer_city' =>  $this->api->input('payer_city'),
                'payer_zip' =>  $this->api->input('payer_zip'),
                'payer_email' =>  $this->api->input('payer_email'),
                'payer_phone' =>  $this->api->input('payer_phone'),
                'payer_ip' => "123.123.123.123",
                'card_number' =>  $this->api->input('card_number'),
                'card_exp_year' =>  $this->api->input('card_exp_year'),
                'card_exp_month' =>  $this->api->input('card_exp_month'),
                'card_cvv2' =>  $this->api->input('card_cvv2'),
                'client_key' =>  $this->api->input('client_key'),
                'client_pas' =>  $this->api->input('client_pas'),
            ]
        );
        echo  $this->paymentApi->sendPostRequest("https://dev-api.rafinita.com/post");
    }
}
