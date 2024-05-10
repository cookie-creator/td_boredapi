<?php

namespace App\Services;

use App\Adapter\APIAdapter\WebAPI;
use App\Managers\CommandArgsManager;
use App\Managers\WebAPIArgsManager;
use App\Parsers\JsonParserBoredAPI;

class BoredAPIService
{
    private $boredUrl = 'https://www.boredapi.com/api/activity';

    public function __construct(public WebAPI $webAPI)
    {

    }

    public function get(CommandArgsManager $args)
    {
        $argsWebAPI = new WebAPIArgsManager($args);
        $argsWebAPI->initArgs();
        $webApiUrl = $this->boredUrl . $argsWebAPI->getArgsInUrl();

        $response = $this->webAPI->get($webApiUrl);
        return JsonParserBoredAPI::parse($response);
    }
}
