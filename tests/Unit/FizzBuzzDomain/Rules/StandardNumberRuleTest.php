<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\StandardNumberRule;

/**
 * StandardNumberRule Test
 */
class StandardNumberRuleTest extends AbstractFizzBuzzRuleTest
{
    /**
     * @return \GameDomain\Rule\AbstractRule
     */
    public function getRule()
    {
        return new StandardNumberRule();
    }

    /**
     * @return array
     */
    public function getValidNumbers()
    {
        return array(
            array(-1),
            array(1),
            array(3),
            array('0'),
            array(PHP_INT_MAX),
        );
    }

    /**
     * @return array
     */
    public function getIrrelevantNumbers()
    {
        return array(
            array(''),
            array('test'),
            array(new \stdClass()),
            array(array(1234)),
            array('100,200'),
        );
    }
}
