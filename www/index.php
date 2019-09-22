<?php



use TheCodingMachine\Gotenberg\Client;
use TheCodingMachine\Gotenberg\DocumentFactory;
use TheCodingMachine\Gotenberg\HTMLRequest;

chdir(dirname(__file__));

echo getcwd() . "\n";
echo '';
echo '<pre>';
print_r(scandir(dirname(__file__)));
echo '</pre>';

function chmod_r($path) {
	$dir = new DirectoryIterator($path);
	foreach ($dir as $item) {
		chmod($item->getPathname(), 0777);
		if ($item->isDir() && !$item->isDot()) {
			chmod_r($item->getPathname());
		}
	}
}

chmod_r('pdf');
echo exec('whoami');


require 'vendor/autoload.php';

$client = new Client('http://dockertp_gotenberg_1:3000', new \Http\Adapter\Guzzle6\Client());
$index = DocumentFactory::makeFromPath('index.html', 'pdf/');
$request = new HTMLRequest($index);
$filename = $client->store($request, 'pdf/test.pdf');