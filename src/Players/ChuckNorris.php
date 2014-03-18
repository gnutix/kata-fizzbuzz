<?php

namespace FizzBuzz\Players;

use FizzBuzz\AbstractRulesSet;
use FizzBuzz\PlayerInterface;

/**
 * Perfect player that never fails.
 */
final class ChuckNorris implements PlayerInterface
{
    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules, $step)
    {
        return $gameRules->generateValidAnswer($step);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'Chuck Norris';
    }
}
