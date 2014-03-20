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
     * @todo Test this
     */
    public function testGenerateValidAnswer()
    {
        $this->markTestIncomplete();
    }
}
