<?php

namespace PaymentApi\src\Storage;

class StorageRequest
{
    public function sendPost($url, $data): bool|string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'error cURL: ' . curl_error($ch);
        }
        curl_close($ch);

        return $response;
    }
}