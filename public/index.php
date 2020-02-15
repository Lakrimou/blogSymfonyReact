<?php

require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;


/*print_r("Namespaces");*/

$json = new JSON([
    "key" => "value",
    "another_key" => "another_value"
    ]);
/*var_dump($json);
echo '<br>';*/
/*var_dump($json->convert());
echo '<br>';*/

// $json->data = [];

var_dump($json->getData());
echo '<br>';
// $json->setData([]);
var_dump($json->convert());
echo '<br>';
var_dump((string)$json);
echo '<br>';

/*
var_dump($json->convert());
echo '<br>';*/


