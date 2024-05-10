<?php

namespace App\Contracts;

interface JsonParserInterface
{
    public static function parse(string $jsonString);
}
