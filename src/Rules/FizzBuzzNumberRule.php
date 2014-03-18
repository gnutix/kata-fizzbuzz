<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * FizzBuzz Number Rule
 */
final class FizzBuzzNumberRule extends AbstractGameRule
{
    const FIRST_TRIGGER_NUMBER = 3;
    const SECOND_TRIGGER_NUMBER = 5;
    const VALID_ANSWER = 'FizzBuzz';

    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer($step)
    {
        if (0 !== $step % static::FIRST_TRIGGER_NUMBER || 0 !== $step % static::SECOND_TRIGGER_NUMBER) {
            throw new IrrelevantGameRule();
        }

        return static::VALID_ANSWER;
    }
}
