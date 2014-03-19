<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Entity\Answer;
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
    public function generateValidAnswer($number)
    {
        if (0 === ($number % static::TRIGGER_NUMBER)) {
            return new Answer(static::VALID_ANSWER);
        }

        throw new IrrelevantGameRule();
    }
}
