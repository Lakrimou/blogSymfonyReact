<?php
declare(strict_types=1);
require __DIR__.'/../vendor/autoload.php';

use App\Container;
use App\Controller\IndexController;
use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\BaseFormat;
use App\Format\FromStringInterface;
use App\Format\NamedFormatInterface;
use App\Service\Serializer;

print_r("Simple Service Container \n\n");
echo '<br>';

$data = [
    "name" => "Akrem",
    "surname" => "Boussaha"
];

var_dump($data);
echo '<br><br>';

//$serilizer = new Serializer(new XML());
//$controller = new IndexController($serilizer);
$container = new Container();

var_dump($container);
echo '<br><br>';
// var_dump($controller->index());
// echo '<br><br>';

$container->addServices('format.json', function() use ($container){
    return new JSON();
});

$container->addServices('format.xml', function() use ($container) {
    return new XML();
});

$container->addServices('format', function() use($container){
    return $container->getService('format.json');
});

$container->addServices('serializer', function() use ($container){
    return new Serializer($container->getService('format'));
});

$container->addServices('controller.index', function() use($container){
    return new IndexController($container->getService('serializer'));
});

var_dump('******************************');
echo '<br>';
var_dump($container->getService('controller.index'));
echo '<br>';
echo '<br>';
var_dump($container->getServices());
echo '<br>';
echo '<br>';
var_dump($container);

