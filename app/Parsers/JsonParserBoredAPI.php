<?php

namespace App\Parsers;

use App\Contracts\JsonParserInterface;
use App\Exceptions\JsonParsingException;

class JsonParserBoredAPI implements JsonParserInterface
{
    public static function parse(string $json)
    {
        $data = json_decode($json, true);

        if ($data === null) {
            throw new JsonParsingException('Json parsing error.');
        } else {
            return $data;
        }
    }
}
