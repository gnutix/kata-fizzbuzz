<?php

namespace Tests\Unit\FizzBuzzDomain\Rules;

use FizzBuzzDomain\Rules\BuzzNumberRule;

/**
 * BuzzNumberRule Test
 */
class BuzzNumberRuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Rules\BuzzNumberRule */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new BuzzNumberRule();
    }

    /**
     * @test
     */
    public function testGenerateValidAnswer()
    {
        $this->assertEquals(BuzzNumberRule::VALID_ANSWER, $this->sut->generateValidAnswer(5)->getRawValue());
    }

    /**
     * @expectedException \GameDomain\Exceptions\IrrelevantRuleException
     */
    public function testIrrelevantRule()
    {
        $this->sut->generateValidAnswer(1);
    }
}
