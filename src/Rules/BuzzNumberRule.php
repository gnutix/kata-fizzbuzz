<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Entity\Answer;
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
    public function generateValidAnswer($number)
    {
        if (0 === ($number % static::TRIGGER_NUMBER)) {
            return new Answer(static::VALID_ANSWER);
        }

        throw new IrrelevantGameRule();
    }
}
