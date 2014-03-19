<?php

namespace FizzBuzz;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Exceptions\IrrelevantGameRuleException;

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
        } catch (IrrelevantGameRuleException $exception) {
            return false;
        }
    }

    /**
     * @param int $number
     *
     * @return \FizzBuzz\Entity\Answer
     * @throws \FizzBuzz\Exceptions\IrrelevantGameRuleException
     */
    abstract public function generateValidAnswer($number);
}
