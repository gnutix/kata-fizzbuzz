<?php

namespace FizzBuzz;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * Game Rule
 */
abstract class AbstractGameRule
{
    /**
     * @param \FizzBuzz\Entity\Answer $playerAnswer
     * @param \FizzBuzz\Entity\Step   $step
     *
     * @return bool
     */
    public function isSatisfiedBy(Answer $playerAnswer, Step $step)
    {
        try {
            return $playerAnswer->isSameAs($this->generateValidAnswer($step));
        } catch (IrrelevantGameRule $exception) {
            return false;
        }
    }

    /**
     * @param \FizzBuzz\Entity\Step $step
     *
     * @return \FizzBuzz\Entity\Answer
     * @throws \FizzBuzz\Exceptions\IrrelevantGameRule
     */
    abstract public function generateValidAnswer(Step $step);
}
