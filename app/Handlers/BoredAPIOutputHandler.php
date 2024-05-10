<?php

namespace App\Handlers;

use App\Contracts\OutputInterface;
use App\Models\Recommendation;

class BoredAPIOutputHandler
{
    public function __construct(public OutputInterface $print)
    {
    }

    public function handle(Recommendation $recomendation)
    {
        $this->print->output($recomendation->getDataByString());
    }
}
