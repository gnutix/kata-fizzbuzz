<?php

namespace GameDomain\Player\Players;

use GameDomain\Player\PlayerInterface;
use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;

/**
 * Perfect Player : always gives a correct answer.
 */
class PerfectPlayer implements PlayerInterface
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
        return 'Perfect';
    }
}
