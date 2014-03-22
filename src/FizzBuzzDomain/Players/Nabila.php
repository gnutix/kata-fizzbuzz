<?php

namespace FizzBuzzDomain\Players;

use GameDomain\Player\PlayerInterface;
use GameDomain\Round\Step\Answer;
use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;

/**
 * Stupid Player : this player never gives a correct answer.
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
