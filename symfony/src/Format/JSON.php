<?php

namespace App\Format;

use App\Format\BaseFormat;

class JSON extends BaseFormat {
    /*const DATA = [
        "success" => true
    ];
    protected $data;

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
        return json_encode($this->data);
    }
}