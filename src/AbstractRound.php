<?php

namespace FizzBuzz;

/**
 * Abstract Round
 */
abstract class AbstractRound
{
    /** @var \LimitIterator */
    protected $players;

    /**
     * @param \LimitIterator $players
     */
    public function __construct(\LimitIterator $players)
    {
        $this->players = $players;
    }

    /**
     * @param \FizzBuzz\AbstractRulesSet $gameRules
     *
     * @return \FizzBuzz\Collections\RoundResult
     */
    abstract public function play(AbstractRulesSet $gameRules);
}
