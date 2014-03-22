<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\StandardNumberRule;

/**
 * StandardNumberRule Test
 */
class StandardNumberRuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Rules\StandardNumberRule */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new StandardNumberRule();
    }

    /**
     * @dataProvider getNumbers
     */
    public function testGenerateValidAnswer($number)
    {
        $this->assertEquals($number, $this->sut->generateValidAnswer($number)->getRawValue());
    }

    /**
     * @return array
     */
    public function getNumbers()
    {
        return array(
            array(1),
            array(3),
            array(15),
            array(0),
            array(-10),
            array(100),
            array(PHP_INT_MAX),
        );
    }

    /**
     * @expectedException \GameDomain\Exceptions\IrrelevantRuleException
     */
    public function testIrrelevantRule()
    {
        $this->sut->generateValidAnswer('test');
    }
}
