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
     * @todo Test this
     */
    public function testGenerateValidAnswer()
    {
        $this->markTestIncomplete();
    }
}
