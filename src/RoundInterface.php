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
     *
     * @param \FizzBuzz\PlayerInterface $player
     * @param string|null               $playerAnswer
     * @param string                    $validAnswer
     * @param int                       $step
     */
    public function terminate(PlayerInterface $player, $playerAnswer, $validAnswer, $step);
}
