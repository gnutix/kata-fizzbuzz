<?php

namespace FizzBuzz;

use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * Game Rule
 */
abstract class AbstractGameRule
{
    /**
     * @param int    $step
     * @param string $playerAnswer
     *
     * @return bool
     */
    public function isSatisfiedBy($step, $playerAnswer)
    {
        try {
            return $playerAnswer === $this->generateValidAnswer($step);
        } catch (IrrelevantGameRule $exception) {
            return false;
        }
    }

    /**
     * @param int $step
     *
     * @return string|null
     * @throws \FizzBuzz\Exceptions\IrrelevantGameRule
     */
    abstract public function generateValidAnswer($step);
}
