<?php
declare(strict_types=1);
require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\BaseFormat;
use App\Format\FromStringInterface;
use App\Format\NamedFormatInterface;

print_r("Typed arguments & return types \n\n");
echo '<br>';

function convertData(BaseFormat $format) {
    return $format->convert();
}

function getFormatName(NamedFormatInterface $format): string
{
    return $format->getName();
}

//? make return type optional

function getFormatByName(array $formats, string $name): ?BaseFormat
{
    foreach ($formats as $format){
        if ($format instanceof NamedFormatInterface &&  $name === $format->getName()) {
            return $format;
        }
    }

    return null;
}

function justDumpData(BaseFormat $format): void {
    var_dump($format->convert());
}

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

var_dump(getFormatByName($formats, 'JSON'));
echo '<br><br>';
justDumpData($formats[1]);