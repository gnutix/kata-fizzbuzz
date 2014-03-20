<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\Nabila;
use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;

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
     * @dataProvider getGameRules
     * @todo Test this
     */
    public function testChuckAlwaysAnswersCorrectly(AbstractRulesSet $gameRules)
    {
        $this->markTestIncomplete();

        $this->assertEquals('Hallo ?!', $this->sut->play($gameRules, new Step(1))->getRawValue());
    }

    /**
     * @return array
     */
    public function getGameRules()
    {
        return array(
            array($this->getMockForAbstractClass('\GameDomain\Rule\AbstractRulesSet')),
        );
    }
}
