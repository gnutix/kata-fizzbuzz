<?php

namespace FizzBuzz;

use FizzBuzz\Entity\Step;

/**
 * Player Interface
 */
interface PlayerInterface
{
    /**
     * @param \FizzBuzz\AbstractRulesSet $gameRules
     * @param \FizzBuzz\Entity\Step      $step
     *
     * @return \FizzBuzz\Entity\Answer
     */
    public function play(AbstractRulesSet $gameRules, Step $step);

    /**
     * @return string
     */
    public function __toString();
}
