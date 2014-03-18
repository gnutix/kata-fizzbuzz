<?php

namespace FizzBuzz\Players;

use FizzBuzz\RulesSetInterface;
use FizzBuzz\PlayerInterface;

/**
 * Stupid Player : this player never gives a valid answer.
 */
final class Nabila implements PlayerInterface
{
    /**
     * {@inheritDoc}
     */
    public function play(RulesSetInterface $gameRules, $step)
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
