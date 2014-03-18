<?php

namespace FizzBuzz;

/**
 * Player Interface
 */
interface PlayerInterface
{
    /**
     * @param \FizzBuzz\AbstractRulesSet $gameRules
     * @param int                        $step
     *
     * @return string|null
     */
    public function play(AbstractRulesSet $gameRules, $step);

    /**
     * @return string
     */
    public function __toString();
}
