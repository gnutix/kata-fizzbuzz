<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;

/**
 * Standard Number Rule
 */
final class StandardNumberRule extends AbstractGameRule
{
    /**
     * @param int $step
     *
     * @return string
     */
    public function generateValidAnswer($step)
    {
        return $step;
    }
}
