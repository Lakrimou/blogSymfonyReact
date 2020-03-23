<?php

namespace App\Format;

use App\Format\BaseFormat;

class XML extends BaseFormat implements NamedFormatInterface, FormatInterface {

    public function convert(): string
    {
        $result = '';

        foreach ($this->data as $key => $element) {
            $result.= '<'.$key.'>'.$element.'</'.$key.'>';
        }

        return htmlspecialchars($result);
    }

    public function getName(): string
    {
        return 'XML';
    }
}