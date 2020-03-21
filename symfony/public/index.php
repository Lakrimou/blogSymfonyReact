<?php
declare(strict_types=1);
require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\BaseFormat;
use App\Format\FromStringInterface;
use App\Format\NamedFormatInterface;

print_r("Anonymous functions \n\n");
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

function findByName($name, $formats): ?BaseFormat
{
    $found = array_filter($formats, function ($format) use($name) {
        return $format->getName() === $name;
    });

    if (count($found)) {
        return reset($found);
    }

    return null;
}

var_dump(findByName("XML", $formats));