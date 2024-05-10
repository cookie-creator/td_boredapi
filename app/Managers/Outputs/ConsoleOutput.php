<?php

namespace App\Managers\Outputs;

use App\Contracts\OutputInterface;
use App\Models\Recommendation;

class ConsoleOutput implements OutputInterface
{
    public function output($result)
    {
        echo "Yor recomendation is: " . $result;
    }
}
