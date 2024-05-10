<?php

namespace App\Managers;

use App\Adapter\APIAdapter\WebAPI;
use App\Models\Recommendation;
use App\Services\BoredAPIService;

class BoredManager
{
    private BoredAPIService $boredAPIService;
    public function __construct()
    {

    }

    public function recommendRest(CommandArgsManager $args) : Recommendation
    {
        $this->boredAPIService = new BoredAPIService(new WebAPI());
        $data = $this->boredAPIService->get($args);

        return new Recommendation($data);
    }
}
