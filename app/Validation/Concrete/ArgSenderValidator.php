<?php

namespace App\Validation\Concrete;

use App\Validation\Contracts\ArgValidatorInterface;
use InvalidArgumentException;

class ArgSenderValidator implements ArgValidatorInterface
{
    private array $possibleArgValues = ["console", "file"];

    public function __construct(public $argValue) {

    }

    public function validate()
    {
        if (! in_array($this->argValue, $this->possibleArgValues)) {
            throw new InvalidArgumentException('Invalid sender value its must be file or console!');
        }
    }
}
