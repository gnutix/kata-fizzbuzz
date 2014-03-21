<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\FizzBuzzNumberRule;

/**
 * FizzBuzzNumberRule Test
 */
class FizzBuzzNumberRuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Rules\FizzBuzzNumberRule */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new FizzBuzzNumberRule();
    }

    /**
     * @test
     */
    public function testGenerateValidAnswer()
    {
        $this->assertEquals(FizzBuzzNumberRule::VALID_ANSWER, $this->sut->generateValidAnswer(15)->getRawValue());
    }

    /**
     * @expectedException \GameDomain\Exceptions\IrrelevantRuleException
     */
    public function testIrrelevantRule()
    {
        $this->sut->generateValidAnswer(1);
    }
}
