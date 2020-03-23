<?php
declare(strict_types=1);
require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\BaseFormat;
use App\Format\FromStringInterface;
use App\Format\NamedFormatInterface;

print_r("Reflections \n\n");
echo '<br>';

$data = [
    "name" => "Akrem",
    "surname" => "Boussaha"
];

var_dump($data);
echo '<br><br>';

$formats = [
    new JSON($data),
    new XML($data),
    new YAML($data),
];

$class = new ReflectionClass(JSON::class);
var_dump($class);
echo '<br>';
$method = $class->getConstructor();
var_dump($method);
echo '<br>';
$parameters = $method->getParameters();
var_dump($parameters);
echo '<br>';
foreach ($parameters as $parameter) {
    $type = $parameter->getType();
    var_dump((string)$type);
    echo '<br>';
    var_dump($type->isBuiltin());
    var_dump($parameter->allowsNull());
    var_dump($parameter->getDefaultValue());
}