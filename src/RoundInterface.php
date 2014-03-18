<?php

namespace FizzBuzz;

/**
 * Round Interface
 */
interface RoundInterface
{
    /**
     * Start the round
     */
    public function start();

    /**
     * Terminate the round
     */
    public function terminate(PlayerInterface $player, $playerAnswer, $validAnswer, $step);
}
