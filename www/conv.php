<?php
use TheCodingMachine\Gotenberg\Client;
use TheCodingMachine\Gotenberg\DocumentFactory;
use TheCodingMachine\Gotenberg\HTMLRequest;

require 'vendor/autoload.php';


ob_start();
require('template/mandat/body.php');
$body = ob_get_clean();

ob_start();
require('template/mandat/footer.php');
$footer = ob_get_clean();


$client = new Client('http://dockertp_gotenberg_1:4000', new \Http\Adapter\Guzzle6\Client());
$index = DocumentFactory::makeFromString('index.html', $body);
$footer = DocumentFactory::makeFromString('footer.html', $footer);

$assets = [
	DocumentFactory::makeFromPath('style.css', 'style.css'),
	//DocumentFactory::makeFromPath('img.png', 'img.png'),
	//DocumentFactory::makeFromPath('font.woff', 'font.woff'),
];


$request = new HTMLRequest($index);
$request->setFooter($footer);


$filename = $client->store($request, 'output/mandat.pdf');