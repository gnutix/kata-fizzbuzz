<?php

namespace FizzBuzz;

/**
 * Round Interface
 */
interface RoundInterface
{
    /**
     * @param \LimitIterator $players
     */
    public function __construct(\LimitIterator $players);

    /**
     * @param \FizzBuzz\AbstractRulesSet $gameRules
     *
     * @return \FizzBuzz\Collections\RoundResult
     */
    public function play(AbstractRulesSet $gameRules);
}
