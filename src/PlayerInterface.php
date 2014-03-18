<?php

namespace FizzBuzz;

use FizzBuzz\Collections\GameRules;

/**
 * Player Interface
 */
interface PlayerInterface
{
    /**
     * @param \FizzBuzz\Collections\GameRules $gameRules
     * @param int                             $step
     *
     * @return string|null
     */
    public function play(GameRules $gameRules, $step);

    /**
     * @return string
     */
    public function __toString();
}
