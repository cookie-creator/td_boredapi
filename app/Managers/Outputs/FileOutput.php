<?php

namespace App\Managers\Outputs;

use App\Contracts\OutputInterface;
use App\Models\Recommendation;

class FileOutput implements OutputInterface
{
    public function output($result)
    {
        file_put_contents('recomendation.txt', $result);
    }
}
