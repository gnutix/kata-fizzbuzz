<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\FizzNumberRule;

/**
 * FizzNumberRule Test
 */
class FizzNumberRuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Rules\FizzNumberRule */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new FizzNumberRule();
    }

    /**
     * @test
     */
    public function testGenerateValidAnswer()
    {
        $this->assertEquals(FizzNumberRule::VALID_ANSWER, $this->sut->generateValidAnswer(3)->getRawValue());
    }

    /**
     * @expectedException \GameDomain\Exceptions\IrrelevantRuleException
     */
    public function testIrrelevantRule()
    {
        $this->sut->generateValidAnswer(1);
    }
}
