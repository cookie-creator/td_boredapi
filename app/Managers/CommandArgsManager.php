<?php

namespace App\Managers;

use App\Validation\CommandArgsValidation;
use InvalidArgumentException;

class CommandArgsManager
{
    public int $participants;

    public string $type;

    public string $sender;

    private int $countArgs = 0;

    public function __construct($argc, $argv) {
        $this->parseArgs($argc, $argv);
    }

    private function parseArgs($argc, $argv) {
        $this->countArgs = $argc - 1;

        if ($this->countArgs < 1 || $this->countArgs > 3) {
            throw new InvalidArgumentException('Invalid number of arguments.!');
        }

        $argsValidator = new CommandArgsValidation();

        for ($i = 1; $i < $argc; $i++) {

            $arg = $argsValidator->addArgument(explode('=', $argv[$i]));

            $this->{$arg[0]} = $arg[1];
        }

        $argsValidator->validate();
    }

    public function getParticipants()
    {
        if (! empty($this->participants)) return $this->participants;
        //return $this->participants;
    }

    public function getType()
    {
        if (! empty($this->type)) return $this->type;
    }

    public function getSender()
    {
        return $this->type;
    }
}
