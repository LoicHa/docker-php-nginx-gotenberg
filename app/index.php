<?php

use TheCodingMachine\Gotenberg\Client;
use TheCodingMachine\Gotenberg\DocumentFactory;
use TheCodingMachine\Gotenberg\HTMLRequest;

require __DIR__ . '/vendor/autoload.php';



$client = new Client('http://localhost:3000', new \Http\Adapter\Guzzle6\Client());
