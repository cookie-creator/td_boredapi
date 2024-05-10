<?php

namespace App\Adapter\APIAdapter;

use App\Facade\HttpFacade;

class WebAPI
{
    public function get(string $url)
    {
        return HttpFacade::get($url);
    }
}
