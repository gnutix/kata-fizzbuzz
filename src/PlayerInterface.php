<?php

namespace FizzBuzz;

/**
 * Player Interface
 */
interface PlayerInterface
{
    /**
     * @param \FizzBuzz\RulesSetInterface $gameRules
     * @param int                        $step
     *
     * @return string|null
     */
    public function play(RulesSetInterface $gameRules, $step);

    /**
     * @return string
     */
    public function __toString();
}
