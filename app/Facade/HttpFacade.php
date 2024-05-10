<?php

namespace App\Facade;

use App\Exceptions\WebApiException;

class HttpFacade
{
    public static function get(string $url)
    {
        $response = file_get_contents($url);

        if ($response === false) {
            throw new WebApiException('Bad $response!');
        } else {
            return $response;
        }
    }
}
