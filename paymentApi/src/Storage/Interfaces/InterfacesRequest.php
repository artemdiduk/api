<?php

namespace PaymentApi\src\Storage\Interfaces;

interface InterfacesRequest
{
    public function sendPost($url, $data): bool|string;
}
