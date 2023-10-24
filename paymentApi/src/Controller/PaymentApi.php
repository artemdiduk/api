<?php

namespace PaymentApi\src\Controller;

use PaymentApi\src\Storage\StorageData;
use PaymentApi\src\Storage\StorageRequest;

class PaymentApi
{
    private StorageData $storageData;
    private StorageRequest $storageRequest;
    private ?array $data;

    #[Pure] public function __construct()
    {
        $this->storageData = new StorageData();
        $this->storageRequest = new StorageRequest();
    }

    public function set(array $data): void
    {
        $this->setData($this->storageData->parsec($data));
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     */
    public function setData(?array $data): void
    {
        $this->data = $data;
    }
    public function sendPostRequest($url): bool|string
    {

        return $this->storageRequest->sendPost($url, $this->getData());
    }
}
