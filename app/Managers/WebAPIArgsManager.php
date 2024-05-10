<?php

namespace App\Managers;

use App\Contracts\WebAPIArgsManagerInterface;

class WebAPIArgsManager implements WebAPIArgsManagerInterface
{
    private array $webapiArgs = [];

    private string $participants;

    private string $type;

    public function __construct(public CommandArgsManager $commandArgs)
    {
    }

    public function initArgs()
    {
        $participants = $this->commandArgs->getParticipants();
        if (! empty($participants)) {
            $this->webapiArgs['participants'] = $participants;
            $this->participants = $participants;
        }

        $type = $this->commandArgs->getType();
        if (! empty($type)) {
            $this->webapiArgs['type'] = $type;
            $this->type = $type;
        }
    }

    /**
     * @return string
     */
    public function getArgsInUrl() : string
    {
        $url = '';

        if (isset($this->webapiArgs['participants'])) {
            $url .= '?participants=' . $this->webapiArgs['participants'];
        }

        if (isset($this->webapiArgs['type'])) {
            $url .= (strpos($url, '?') !== false ? '&' : '?') . 'type=' . $this->webapiArgs['type'];
        }

        return $url;
    }
}
