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
     * @todo Test this
     */
    public function testGenerateValidAnswer()
    {
        $this->markTestIncomplete();
    }
}
