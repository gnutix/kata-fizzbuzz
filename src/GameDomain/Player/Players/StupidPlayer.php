<?php

namespace GameDomain\Player\Players;

use GameDomain\Player\PlayerInterface;
use GameDomain\Round\Step\Answer;
use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;

/**
 * Stupid Player : this player never gives a correct answer.
 */
class StupidPlayer implements PlayerInterface
{
    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules, Step $step)
    {
        $validAnswer = $gameRules->generateValidAnswer($step->getRawValue());

        // Obfuscate the answer so that it's never correct
        return new Answer(md5($validAnswer->getRawValue()));
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'Stupid';
    }
}
