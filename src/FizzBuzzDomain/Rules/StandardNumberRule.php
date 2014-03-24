<?php

namespace FizzBuzzDomain\Rules;

use GameDomain\Exceptions\IrrelevantRuleException;
use GameDomain\Round\Step\Answer;
use GameDomain\Rule\AbstractRule;

/**
 * Standard Number Rule
 */
final class StandardNumberRule extends AbstractRule
{
    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer($number)
    {
        if (is_numeric($number)) {
            return new Answer($number);
        }

        throw new IrrelevantRuleException();
    }
}
