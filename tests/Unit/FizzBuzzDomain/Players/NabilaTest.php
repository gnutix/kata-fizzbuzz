<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\Nabila;
use GameDomain\Round\Step\Step;

/**
 * Nabila Test
 */
class NabilaTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Players\Nabila */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new Nabila();
    }

    /**
     * @param int $stepNumber
     *
     * @dataProvider getSteps
     */
    public function testPlay($stepNumber)
    {
        $this->assertEquals('Hallo ?!', $this->sut->play($this->getGameRules(), new Step($stepNumber))->getRawValue());
    }

    /**
     * @return array
     */
    public function getSteps()
    {
        return array(
            array(1),
            array(3),
            array(5),
            array(15),
            array(100),
        );
    }

    /**
     * @return \GameDomain\Rule\AbstractRulesSet
     */
    public function getGameRules()
    {
        return $this->getMockForAbstractClass('\GameDomain\Rule\AbstractRulesSet');
    }
}
