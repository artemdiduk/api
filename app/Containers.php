<?php

namespace App;

use App\Controller\MainController;
use Framework\Api\Api;

class Containers
{
    public $containers;

    public function __construct()
    {
        $this->containers['MainController'] = new MainController(
            new Api(),
        );
    }
}
