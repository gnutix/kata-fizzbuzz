<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\FizzBuzzNumberRule;

/**
 * FizzBuzzNumberRule Test
 */
class FizzBuzzNumberRuleTest extends AbstractFizzBuzzRuleTest
{
    /**
     * @return \GameDomain\Rule\AbstractRule
     */
    public function getRule()
    {
        return new FizzBuzzNumberRule();
    }

    /**
     * @return array
     */
    public function getValidNumbers()
    {
        return array(
            array(15),
            array(30),
            array(60),
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
            array(12),
            array(100),
        );
    }
}
