<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * FizzBuzz Number Rule
 */
final class FizzBuzzNumberRule extends AbstractGameRule
{
    const VALID_ANSWER = 'FizzBuzz';

    /** @var array */
    protected $triggerNumbers = array(3, 5);

    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer($step)
    {
        foreach ($this->triggerNumbers as $number) {
            if (0 !== $step % $number) {
                throw new IrrelevantGameRule();
            }
        }

        return static::VALID_ANSWER;
    }
}
