<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\FizzNumberRule;

/**
 * FizzNumberRule Test
 */
class FizzNumberRuleTest extends AbstractFizzBuzzRuleTest
{
    /**
     * @return \GameDomain\Rule\AbstractRule
     */
    public function getRule()
    {
        return new FizzNumberRule();
    }

    /**
     * @return array
     */
    public function getValidNumbers()
    {
        return array(
            array(3),
            array(9),
            array(12),
            array(90),
        );
    }

    /**
     * @return array
     */
    public function getIrrelevantNumbers()
    {
        return array(
            array(1),
            array(5),
            array(17),
            array(100),
        );
    }
}
