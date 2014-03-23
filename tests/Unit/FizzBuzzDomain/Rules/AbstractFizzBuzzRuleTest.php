<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

/**
 * Abstract FizzBuzz Rule Test
 */
abstract class AbstractFizzBuzzRuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $number
     *
     * @dataProvider getValidNumbers
     */
    public function testGenerateValidAnswer($number)
    {
        $this->assertTrue($this->getRule()->isSatisfiedBy($this->getRule()->generateValidAnswer($number), $number));
    }

    /**
     * @param int $number
     *
     * @dataProvider getIrrelevantNumbers
     * @expectedException \GameDomain\Exceptions\IrrelevantRuleException
     */
    public function testIrrelevantRule($number)
    {
        $this->getRule()->generateValidAnswer($number);
    }

    /**
     * @return \GameDomain\Rule\AbstractRule
     */
    abstract public function getRule();

    /**
     * @return array
     */
    abstract public function getValidNumbers();

    /**
     * @return array
     */
    abstract public function getIrrelevantNumbers();
}
