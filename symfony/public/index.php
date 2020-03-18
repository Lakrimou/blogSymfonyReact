<?php

require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;

print_r('inheritance');


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



var_dump($json);
echo '<br>';
var_dump($xml);
echo '<br>';
var_dump($yml);
echo '<br>';
echo '<br>';


var_dump($json->convert());
echo '<br>';
var_dump($xml->convert());
echo '<br>';
var_dump($yml->convert());

