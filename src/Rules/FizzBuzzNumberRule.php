<?php

namespace FizzBuzz\Rules;

use FizzBuzz\AbstractGameRule;
use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * FizzBuzz Number Rule
 */
final class FizzBuzzNumberRule extends AbstractGameRule
{
    const FIRST_TRIGGER_NUMBER = 3;
    const SECOND_TRIGGER_NUMBER = 5;
    const VALID_ANSWER = 'FizzBuzz';

    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer(Step $step)
    {
        if (0 === ((string) $step % static::FIRST_TRIGGER_NUMBER) &&
            0 === ((string) $step % static::SECOND_TRIGGER_NUMBER)
        ) {
            return new Answer(static::VALID_ANSWER);
        }

        throw new IrrelevantGameRule();
    }
}
