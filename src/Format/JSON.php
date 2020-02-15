<?php

namespace App\Format;

class JSON {
    const DATA = [
        "success" => true
    ];
    private $data;

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

    public function convert()
    {
        return $this->toJson();
    }

    public function __toString()
    {
        return 'Akrem';
    }

    private function toJson()
    {
        return json_encode(
            array_merge(
                self::DATA,
                $this->data
            ));
    }

    public static function convertData()
    {
        return json_encode(self::DATA);
    }
}