<?php

namespace FizzBuzz;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * Game Rule
 */
abstract class AbstractGameRule
{
    /**
     * @param \FizzBuzz\Entity\Answer $playerAnswer
     * @param int                     $number
     *
     * @return bool
     */
    public function isSatisfiedBy(Answer $playerAnswer, $number)
    {
        try {
            return $playerAnswer->isSameAs($this->generateValidAnswer($number));
        } catch (IrrelevantGameRule $exception) {
            return false;
        }
    }

    /**
     * @param int $number
     *
     * @return \FizzBuzz\Entity\Answer
     * @throws \FizzBuzz\Exceptions\IrrelevantGameRule
     */
    abstract public function generateValidAnswer($number);
}
