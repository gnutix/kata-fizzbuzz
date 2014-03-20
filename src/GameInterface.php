<?php

namespace FizzBuzz;

use FizzBuzz\Collections\Rounds;

/**
 * Game Interface
 */
interface GameInterface
{
    /**
     * @param \FizzBuzz\AbstractRulesSet $gameRules
     */
    public function __construct(AbstractRulesSet $gameRules);

    /**
     * @param \FizzBuzz\Collections\Rounds
     *
     * @return \FizzBuzz\Collections\GameResult
     */
    public function play(Rounds $rounds);
}
