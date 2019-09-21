<?php

require_once "vendor/autoload.php";

use Php\Mistake\QueueRunnerApplication;

$app = new QueueRunnerApplication();
$app->main();