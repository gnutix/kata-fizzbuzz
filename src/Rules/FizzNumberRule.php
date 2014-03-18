<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * Fizz Number Rule
 */
final class FizzNumberRule extends AbstractGameRule
{
    const TRIGGER_NUMBER = 3;
    const VALID_ANSWER = 'Fizz';

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
