<?php

namespace FizzBuzzDomain\Rules;

use GameDomain\Exceptions\IrrelevantRuleException;
use GameDomain\Round\Step\Answer;
use GameDomain\Rule\AbstractRule;

/**
 * Buzz Number Rule
 */
final class BuzzNumberRule extends AbstractRule
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

        throw new IrrelevantRuleException();
    }
}
