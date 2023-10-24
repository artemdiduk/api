<?php

use Framework\Route;
use App\Containers;

$containers = new Containers();

Route::set('/', ['controller' => $containers->containers['MainController'], "method" => "index"], "GET");
Route::set('/purchase', ['controller' => $containers->containers['MainController'], "method" => "paymentApi"], "POST");
