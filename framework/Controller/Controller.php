<?php

namespace Framework\Controller;

abstract class Controller
{
    public function render(string $template, array $data = null): void
    {
        if (!is_null($data)) {
            extract($data, EXTR_PREFIX_SAME, "wddx");
        }

        require_once __DIR__ . "/../../resource/view/{$template}.php";
    }
}
