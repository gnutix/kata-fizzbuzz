<?php

namespace FizzBuzzDomain\Rules;

use GameDomain\Exceptions\IrrelevantRuleException;
use GameDomain\Round\Step\Answer;
use GameDomain\Rule\AbstractRule;

/**
 * Fizz Number Rule
 */
final class FizzNumberRule extends AbstractRule
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

        throw new IrrelevantRuleException();
    }
}
