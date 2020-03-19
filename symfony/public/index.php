<?php

require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\BaseFormat;

print_r("Abstract Class\n\n");
echo '<br>';


$data = [
    "name" => "Akrem",
    "surname" => "Boussaha"
];

var_dump($data);

$json = new JSON($data);
echo '<br>';
$xml = new XML($data);
echo '<br>';
$yml = new YAML($data);
echo '<br>';
/*$base = new BaseFormat($data);*/


var_dump($json);
echo '<br>';
var_dump($xml);
echo '<br>';
var_dump($yml);
echo '<br>';
/*var_dump($base);
echo '<br>';*/


var_dump($json->convert());
echo '<br>';
var_dump($xml->convert());
echo '<br>';
var_dump($yml->convert());
echo '<br>';
/*var_dump($base->convert());*/
