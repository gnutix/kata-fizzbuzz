<?php

require_once __DIR__.'/vendor/autoload.php';

use FizzBuzz\Game;
use FizzBuzz\FizzBuzz;

$game = new Game;
$fizzBuzz = new FizzBuzz;

echo implode(PHP_EOL, $fizzBuzz->play($game));
