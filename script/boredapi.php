<?php

declare(strict_types=1);

require_once __DIR__ . "/../app/Adapter/APIAdapter/WebAPI.php";
require_once __DIR__ . "/../app/Contracts/JsonParserInterface.php";
require_once __DIR__ . "/../app/Contracts/OutputInterface.php";
require_once __DIR__ . "/../app/Contracts/WebAPIArgsManagerInterface.php";
require_once __DIR__ . "/../app/Enums/Args.php";
require_once __DIR__ . "/../app/Exceptions/JsonParsingException.php";
require_once __DIR__ . "/../app/Exceptions/WebApiException.php";
require_once __DIR__ . "/../app/Facade/HttpFacade.php";
require_once __DIR__ . "/../app/Handlers/BoredAPIOutputHandler.php";
require_once __DIR__ . "/../app/Managers/Outputs/ConsoleOutput.php";
require_once __DIR__ . "/../app/Managers/BoredManager.php";
require_once __DIR__ . "/../app/Managers/CommandArgsManager.php";
require_once __DIR__ . "/../app/Managers/WebAPIArgsManager.php";
require_once __DIR__ . "/../app/Models/Recommendation.php";
require_once __DIR__ . "/../app/Parsers/JsonParserBoredAPI.php";
require_once __DIR__ . "/../app/Services/BoredAPIService.php";
require_once __DIR__ . "/../app/Validation/Contracts/ArgValidatorInterface.php";
require_once __DIR__ . "/../app/Validation/Concrete/ArgParticipantsValidator.php";
require_once __DIR__ . "/../app/Validation/Concrete/ArgSenderValidator.php";
require_once __DIR__ . "/../app/Validation/Concrete/ArgTypeValidator.php";
require_once __DIR__ . "/../app/Validation/CommandArgsValidation.php";

use App\Handlers\BoredAPIOutputHandler;
use App\Managers\BoredManager;
use App\Managers\CommandArgsManager;
use App\Managers\Outputs\ConsoleOutput;
use App\Managers\Outputs\FileOutput;

//require_once __DIR__ . '/../vendor/autoload.php';

// Args received
$appArgs = new CommandArgsManager($argc, $argv);

$boredManager = new BoredManager();
$recomendation = $boredManager->recommendRest($appArgs);

if ($appArgs->sender == 'file') {
    $output = new BoredAPIOutputHandler(new FileOutput());
} elseif ($appArgs->sender == 'console') {
    $output = new BoredAPIOutputHandler(new ConsoleOutput());
}

$output->handle($recomendation);
