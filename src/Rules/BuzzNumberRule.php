<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * Buzz Number Rule
 */
final class BuzzNumberRule extends AbstractGameRule
{
    const TRIGGER_NUMBER = 5;
    const VALID_ANSWER = 'Buzz';

    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer($step)
    {
        if (0 === $step % static::TRIGGER_NUMBER) {
            return static::VALID_ANSWER;
        }

        throw new IrrelevantGameRule();
    }
}
