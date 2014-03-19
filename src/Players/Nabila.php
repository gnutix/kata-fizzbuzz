<?php

namespace FizzBuzz\Players;

use FizzBuzz\AbstractRulesSet;
use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\PlayerInterface;

/**
 * Stupid Player : this player never gives a valid answer.
 */
final class Nabila implements PlayerInterface
{
    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules, Step $step)
    {
        return new Answer('Hallo ?!');
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'Nabila';
    }
}
