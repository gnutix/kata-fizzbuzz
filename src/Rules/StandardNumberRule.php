<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;

/**
 * Standard Number Rule
 */
final class StandardNumberRule extends AbstractGameRule
{
    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer(Step $step)
    {
        return new Answer($step->getRawValue());
    }
}
