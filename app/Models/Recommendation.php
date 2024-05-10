<?php

namespace App\Models;

class Recommendation
{
    public $activity;
    public $type;
    public $participants;
    public $price;
    public $link;
    public $key;
    public $accessibility;

    public $error;

    public $data = [];

    public function __construct($data) {
        $this->data = $data;
        $this->error = $data['error'] ?? null;
        $this->activity = $data['activity'] ?? null;
        $this->accessibility = $data['accessibility'] ?? null;
        $this->type = isset($data['type']) ? $data['type'] : null;
        $this->participants = $data['participants'] ?? null;
        $this->price = $data['price'] ?? null;
        $this->link = $data['link'] ?? null;
        $this->key = $data['key'] ?? null;
    }

    public function getDataByString() : string
    {
        $resultString = '';

        foreach ($this->data as $key => $value) {
            if ($value) {
                $resultString .= $key . ' ' . $value . ', ';
            }
        }

        return trim(trim($resultString), ",");
    }
}
