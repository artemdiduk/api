<?php

namespace PaymentApi\src\Storage;

use PaymentApi\src\Storage\Interfaces\InterfacesData;

class StorageData implements InterfacesData
{
    public function parsec(array $array): array
    {
        $data = array_filter(array_map(function ($field) {
            return $field;
        }, $array));
        $hash = $this->hash($data['payer_email'] ?? null, $data['client_pas'] ?? null, $data['card_number'] ?? null);
        $data['hash'] = $hash;
        return  $data;
    }

    public function hash($email, $clientPass, $cardNumber): string
    {
        if (!empty($email) && !empty($clientPass) && !empty($cardNumber)) {
            $strToHash = strtoupper(strrev($email) . $clientPass);
            $strToHash .= strrev(substr($cardNumber, 0, 6) . substr($cardNumber, -4));
            return md5($strToHash);
        }
        return "";
    }
}
