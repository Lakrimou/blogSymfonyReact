<?php

namespace App\Format;

abstract class BaseFormat
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public abstract function convert();
    /*{
        return 'i\'m not converting anything';
    }*/

    //public abstract function convertFromString();

    public function __toString()
    {
        return $this->convert();
    }
}