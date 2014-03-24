<?php

namespace GameDomain\Player;

use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;

/**
 * Player Interface
 */
interface PlayerInterface
{
    /**
     * @param \GameDomain\Rule\AbstractRulesSet $gameRules
     * @param \GameDomain\Round\Step\Step       $step
     *
     * @return \GameDomain\Round\Step\Answer
     */
    public function play(AbstractRulesSet $gameRules, Step $step);

    /**
     * @return string
     */
    public function __toString();
}
