<?php



use TheCodingMachine\Gotenberg\Client;
use TheCodingMachine\Gotenberg\DocumentFactory;
use TheCodingMachine\Gotenberg\HTMLRequest;


require 'vendor/autoload.php';

ob_start();
require('pdf.php');
$content = ob_get_clean();


$client = new Client('http://dockertp_gotenberg_1:4000', new \Http\Adapter\Guzzle6\Client());
$index = DocumentFactory::makeFromString('index.html', $content);
$request = new HTMLRequest($index);
$filename = $client->store($request, 'pdf/test.pdf');