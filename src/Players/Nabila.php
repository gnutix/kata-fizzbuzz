<?php

namespace FizzBuzz\Players;

use FizzBuzz\Collections\GameRules;
use FizzBuzz\PlayerInterface;

/**
 * Stupid Player : this player never gives a valid answer.
 */
final class Nabila implements PlayerInterface
{
    /**
     * {@inheritDoc}
     */
    public function play(GameRules $gameRules, $step)
    {
        return 'Hallo ?!';
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'Nabila';
    }
}
