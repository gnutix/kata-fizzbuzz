<?php

namespace GameDomain\Rule;

use GameDomain\Round\Step\Answer;
use GameDomain\Exceptions\IrrelevantRuleException;

/**
 * Rule
 */
abstract class AbstractRule
{
    /**
     * @param \GameDomain\Round\Step\Answer $playerAnswer
     * @param int                           $number
     *
     * @return bool
     */
    public function isSatisfiedBy(Answer $playerAnswer, $number)
    {
        try {
            return $playerAnswer->isSameAs($this->generateValidAnswer($number));
        } catch (IrrelevantRuleException $exception) {
            return false;
        }
    }

    /**
     * @param int $number
     *
     * @return \GameDomain\Round\Step\Answer
     * @throws \GameDomain\Exceptions\IrrelevantRuleException
     */
    abstract public function generateValidAnswer($number);
}
