<?php

namespace App\Format;

use App\Format\BaseFormat;

class YAML extends BaseFormat implements NamedFormatInterface {

    /*private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }*/

    public function convert()
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