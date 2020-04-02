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
use App\Format\FormatInterface;
use App\Service\Serializer;

print_r("Autowired Service Container \n\n");
echo '<br>';

$data = [
    "name" => "Akrem",
    "surname" => "Boussaha"
];

//var_dump($data);
echo '<br><br>';

//$serilizer = new Serializer(new XML());
//$controller = new IndexController($serilizer);
$container = new Container();

//var_dump($container);
echo '<br><br>';
// var_dump($controller->index());
// echo '<br><br>';

$container->addServices('format.json', function() use ($container){
    return new JSON();
}, FormatInterface::class);

$container->addServices('format.xml', function() use ($container) {
    return new XML();
}, FormatInterface::class);

$container->addServices('format', function() use($container){
    return $container->getService('format.json');
}, FormatInterface::class);

// $container->addServices('serializer', function() use ($container){
//     return new Serializer($container->getService('format'));
// }, FormatInterface::class);

// $container->addServices('controller.index', function() use($container){
//     return new IndexController($container->getService('serializer'));
// }, FormatInterface::class);

$container->loadServices('App\\Service');
$container->loadServices('App\\Controller');

var_dump('******************************');
echo '<br>';
var_dump($container->getService('App\\Controller\\IndexController')->index());
var_dump('******************************');
echo '<br>';
var_dump($container->getService('App\\Controller\\PostController')->index());
var_dump('******************************');
echo '<br>';
echo '<br>';
echo '<br>';
var_dump($container->getServices());
echo '<br>';
echo '<br>';
var_dump($container);

