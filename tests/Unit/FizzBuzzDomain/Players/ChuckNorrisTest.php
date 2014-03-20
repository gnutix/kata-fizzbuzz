<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\ChuckNorris;
use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;

/**
 * ChuckNorris Test
 */
class ChuckNorrisTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Players\ChuckNorris */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new ChuckNorris();
    }

    /**
     * @dataProvider getGameRules
     * @todo Test this
     */
    public function testChuckAlwaysAnswersCorrectly(AbstractRulesSet $gameRules)
    {
        $this->markTestIncomplete();

        $this->assertEquals(1, $this->sut->play($gameRules, new Step(1))->getRawValue());
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
