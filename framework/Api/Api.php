<?php

namespace Framework\Api;

class Api implements ApiInterface
{
    public ?array $api;

    public function __construct()
    {
        $this->api = $this->jsonServer();
    }

    public function input(string $data): string
    {
        return trim($this->api[$data] ?? '');
    }


    public function only(array $array): self
    {
        $result = [];

        foreach ($array as $key) {
            $result[$key] = $this->input($key);
        }
        $this->api = $result;
        return $this;
    }

    public function get(): array
    {
        return $this->api;
    }


    public function jsonServer(): ?array
    {
        $inputData = file_get_contents('php://input');
        $jsonData = json_decode($inputData, true);
        return $jsonData;
    }
}
