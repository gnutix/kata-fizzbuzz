<?php

namespace FizzBuzzDomain\Rules;

use GameDomain\Exceptions\IrrelevantRuleException;
use GameDomain\Round\Step\Answer;
use GameDomain\Rule\AbstractRule;

/**
 * FizzBuzz Number Rule
 */
final class FizzBuzzNumberRule extends AbstractRule
{
    const FIRST_TRIGGER_NUMBER = 3;
    const SECOND_TRIGGER_NUMBER = 5;
    const VALID_ANSWER = 'FizzBuzz';

    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer($number)
    {
        if (0 === ($number % static::FIRST_TRIGGER_NUMBER) + ($number % static::SECOND_TRIGGER_NUMBER)) {
            return new Answer(static::VALID_ANSWER);
        }

        throw new IrrelevantRuleException();
    }
}
