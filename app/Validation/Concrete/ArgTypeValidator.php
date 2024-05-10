<?php

namespace App\Validation\Concrete;

use App\Validation\Contracts\ArgValidatorInterface;
use InvalidArgumentException;

class ArgTypeValidator implements ArgValidatorInterface
{
    private array $possibleArgValues =  [
        "education",
        "recreational",
        "social",
        "diy",
        "charity",
        "cooking",
        "relaxation",
        "music",
        "busywork"
    ];

    public function __construct(public $argValue) {

    }

    public function validate()
    {
        if (! in_array($this->argValue, $this->possibleArgValues)) {
            throw new InvalidArgumentException('Invalid type value!');
        }
    }
}
