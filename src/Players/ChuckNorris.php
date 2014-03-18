<?php

namespace FizzBuzz\Players;

use FizzBuzz\AbstractRulesSet;
use FizzBuzz\Exceptions\IrrelevantGameRule;
use FizzBuzz\PlayerInterface;

/**
 * Perfect player that never fails.
 */
final class ChuckNorris implements PlayerInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws \DomainException
     */
    public function play(AbstractRulesSet $gameRules, $step)
    {
        foreach ($gameRules->toArray() as $gameRule) {
            try {
                return $gameRule->generateValidAnswer($step);
            } catch (IrrelevantGameRule $exception) {
                continue;
            }
        }

        throw new \DomainException('The player cannot generate a valid answer based on the given game rules.');
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'Chuck Norris';
    }
}
