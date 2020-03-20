<?php

namespace App\Format;

use App\Format\BaseFormat;

class XML extends BaseFormat implements NamedFormatInterface {

    public function convert()
    {
        $result = '';

        foreach ($this->data as $key => $element) {
            $result.= '<'.$key.'>'.$element.'</'.$key.'>';
        }

        return htmlspecialchars($result);
    }

    public function getName()
    {
        return 'XML';
    }
}