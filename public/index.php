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
$xml = new XML();
$yaml = new YAML();

/*use App\Format;
$json = new Format\JSON();
$xml = new Format\XML();
$yaml = new Format\YAML();*/

/*use App\Format as F;
$json = new F\JSON();
$yaml = new F\YAML();
$xml = new F\XML();*/

/*use App\Format\{JSON, XML, YAML};*/

var_dump($json);
echo '<br>';
var_dump($json->convert());
echo '<br>';
var_dump(JSON::DATA);
echo '<br>';
var_dump(JSON::convertData());
echo '<br>';
var_dump($xml);
echo '<br>';
var_dump($yaml);