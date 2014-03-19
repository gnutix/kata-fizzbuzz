<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Entity\Answer;

/**
 * Standard Number Rule
 */
final class StandardNumberRule extends AbstractGameRule
{
    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer($number)
    {
        return new Answer($number);
    }
}
