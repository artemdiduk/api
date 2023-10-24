<?php

namespace PaymentApi\src\Storage\Interfaces;

interface InterfacesData
{
    public function parsec(array $array): array;

    public function hash($email, $clientPass, $cardNumber): string;
}
