<?php

require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\BaseFormat;
use App\Format\FromStringInterface;
use App\Format\NamedFormatInterface;

print_r("Interfaces\n\n");
echo '<br>';


$data = [
    "name" => "Akrem",
    "surname" => "Boussaha"
];

var_dump($data);

$json = new JSON($data);
$xml = new XML($data);
$yml = new YAML($data);

/*$base = new BaseFormat($data);*/


/*var_dump($json);
echo '<br>';
var_dump($xml);
echo '<br>';
var_dump($yml);
echo '<br>';*/
/*var_dump($base);
echo '<br>';*/

/*var_dump($json->convert());
echo '<br>';
var_dump($xml->convert());
echo '<br>';
var_dump($yml->convert());
echo '<br>';*/

$formats = [$json, $xml, $yml];

foreach ($formats as $format) {

    if ($format instanceof NamedFormatInterface) {
        print_r($format->getName());
    }

    echo '<br>';
    var_dump(get_class($format));
    echo '<br>';
    var_dump($format->convert());

    if ($format instanceof FromStringInterface) {
        var_dump($format->convertFromString('{"name":"John", "surname":"Doe"}'));
    }
}

/*var_dump($base->convert());*/
