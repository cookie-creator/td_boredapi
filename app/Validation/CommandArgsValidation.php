<?php

namespace App\Validation;

use App\Enums\Args;
use App\Validation\Concrete\ArgParticipantsValidator;
use App\Validation\Concrete\ArgSenderValidator;
use App\Validation\Concrete\ArgTypeValidator;
use App\Validation\Contracts\ArgValidatorInterface;
use InvalidArgumentException;

class CommandArgsValidation
{
    private array $valideArgsNames = ["participants" => '', "type" => '', "sender"  => 'required'];

    private array $arguments = [];

    public function addArgument(array $arg)
    {
        $argName = $arg[0];
        $argValue = $arg[1];
        if (isset($this->valideArgsNames)) {
            if (Args::Participants->value === $argName) {
                $this->addValidator($argName, new ArgParticipantsValidator($argValue));
            }
            if (Args::Type->value === $argName) {
                $this->addValidator($argName, new ArgTypeValidator($argValue));
            }
            if (Args::Sender->value === $argName) {
                $this->addValidator($argName, new ArgSenderValidator($argValue));
            }
        } else {
            throw new InvalidArgumentException('Invalid argument name!');
        }

        return $arg;
    }

    /**
     * @param ArgValidatorInterface $validator
     * @return void
     */
    public function addValidator(string $key, ArgValidatorInterface $validator)
    {
        $this->arguments[$key] = $validator;
    }

    public function validate()
    {
        foreach ($this->arguments as $arg) {
            $arg->validate();
        }

        foreach ($this->valideArgsNames as $key => $name) {
            if ($name === 'required' && empty($this->arguments[$key])) {
                throw new InvalidArgumentException('Field ' . $key . ' is required!');
            }
        }
    }
}
