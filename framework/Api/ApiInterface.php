<?php

namespace Framework\Api;

interface ApiInterface
{
    public function input(string $data): string;

    public function only(array $array): self;

    public function get(): array;

    public function jsonServer(): ?array;
}
