<?php

namespace FizzBuzzDomain\Rules;

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
        return new Answer($number);
    }
}
