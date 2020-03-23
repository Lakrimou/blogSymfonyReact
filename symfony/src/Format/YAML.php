<?php

namespace App\Format;

use App\Format\BaseFormat;

class YAML extends BaseFormat implements NamedFormatInterface, FormatInterface {

    public function convert(): string
    {
        $result = '';

        foreach ($this->data as $key => $element)
        {
            $result .= $key.':'.$element.'<br>';
        }

        return $result;
    }

    public function getName(): string
    {
        return 'YML';
    }
}