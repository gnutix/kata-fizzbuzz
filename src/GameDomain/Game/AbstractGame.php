<?php

namespace GameDomain\Game;

use GameDomain\Round\RoundCollection;
use GameDomain\Rule\AbstractRulesSet;

/**
 * Game
 */
abstract class AbstractGame
{
    /** @var \GameDomain\Rule\AbstractRulesSet */
    protected $gameRules;

    /**
     * {@inheritDoc}
     */
    final public function __construct(AbstractRulesSet $gameRules)
    {
        $this->gameRules = $gameRules;
    }

    /**
     * @param \GameDomain\Round\RoundCollection $rounds
     *
     * @return \GameDomain\Round\RoundResultCollection
     */
    abstract public function play(RoundCollection $rounds);
}
