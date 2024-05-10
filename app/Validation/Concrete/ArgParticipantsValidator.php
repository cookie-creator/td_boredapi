<?php

namespace App\Validation\Concrete;

use App\Validation\Contracts\ArgValidatorInterface;
use InvalidArgumentException;

class ArgParticipantsValidator implements ArgValidatorInterface
{
    public function __construct(public $argValue) {

    }

    public function validate()
    {
        if ($this->argValue < 0 || $this->argValue > 8) {
            throw new InvalidArgumentException('Invalid Participants number!');
        }
    }
}
