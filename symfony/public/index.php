<?php
declare(strict_types=1);
require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\BaseFormat;
use App\Format\FromStringInterface;
use App\Format\NamedFormatInterface;
use App\Serializer;

print_r("Dependency Injection \n\n");
echo '<br>';

$data = [
    "name" => "Akrem",
    "surname" => "Boussaha"
];

var_dump($data);
echo '<br><br>';

$serilizer = new Serializer(new XML());
var_dump($serilizer->serialize($data));

// $formats = [
//     new JSON(),
//     new XML(),
//     new YAML(),
// ];
