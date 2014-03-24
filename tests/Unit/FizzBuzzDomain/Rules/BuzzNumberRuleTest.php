<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\BuzzNumberRule;

/**
 * BuzzNumberRule Test
 */
class BuzzNumberRuleTest extends AbstractFizzBuzzRuleTest
{
    /**
     * @return \GameDomain\Rule\AbstractRule
     */
    public function getRule()
    {
        return new BuzzNumberRule();
    }

    /**
     * @return array
     */
    public function getValidNumbers()
    {
        return array(
            array(5),
            array(10),
            array(25),
            array(100),
        );
    }

    /**
     * @return array
     */
    public function getIrrelevantNumbers()
    {
        return array(
            array(1),
            array(3),
            array(7),
            array(14),
        );
    }
}
