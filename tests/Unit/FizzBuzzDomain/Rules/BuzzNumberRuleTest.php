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
     * @todo Test this
     */
    public function testGenerateValidAnswer()
    {
        $this->markTestIncomplete();
    }
}
