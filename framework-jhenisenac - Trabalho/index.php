<?php
//dd(__DIR__); //metofd magico a posicao do diretorio,

$mainPosition = __DIR__;
error_reporting(E_ERROR | E_PARSE);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require_once("{$mainPosition}\helper\helper.php");
require_once("{$mainPosition}\\vendor\autoload.php");

use Bootstrap\Env;
use App\FrameworkTools\Implementation\FactoryMethods\FactoryProcessServerElement;
use App\FrameworkTools\Implementation\Route\RouteProcess;

Env::execute();

$factoryProcessServerElement = new FactoryProcessServerElement();
$factoryProcessServerElement->operation();

RouteProcess::execute();