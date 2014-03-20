<?php

namespace FizzBuzzDomain\Players;

use GameDomain\Player\PlayerInterface;
use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;

/**
 * Perfect player that never fails.
 */
final class ChuckNorris implements PlayerInterface
{
    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules, Step $step)
    {
        return $gameRules->generateValidAnswer($step->getRawValue());
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'Chuck Norris';
    }
}
