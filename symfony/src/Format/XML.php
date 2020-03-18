<?php

namespace App\Format;

use App\Format\BaseFormat;

class XML extends BaseFormat{

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
    }

    */

    public function convert()
    {
        $result = '';

        foreach ($this->data as $key => $element) {
            $result.= '<'.$key.'>'.$element.'</'.$key.'>';
        }

        return htmlspecialchars($result);
    }
}