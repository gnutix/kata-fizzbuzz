<?php

namespace GameDomain\Round;

use GameDomain\Rule\AbstractRulesSet;

/**
 * Round
 */
abstract class AbstractRound
{
    /** @var \LimitIterator */
    protected $players;

    /**
     * @param \LimitIterator $players
     */
    final public function __construct(\LimitIterator $players)
    {
        $this->players = $players;
    }

    /**
     * @param \GameDomain\Rule\AbstractRulesSet $gameRules
     *
     * @return \GameDomain\Round\Step\StepResultCollection
     */
    abstract public function play(AbstractRulesSet $gameRules);
}
