<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\ChuckNorris;
use GameDomain\Round\Step\Answer;
use GameDomain\Round\Step\Step;

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
     * @param int $stepNumber
     *
     * @dataProvider getSteps
     */
    public function testPlay($stepNumber)
    {
        $this->assertEquals(
            $this->getGameRules()->generateValidAnswer($stepNumber),
            $this->sut->play($this->getGameRules(), new Step($stepNumber))->getRawValue()
        );
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
        $gameRules = $this->getMockForAbstractClass(
            '\GameDomain\Rule\AbstractRulesSet',
            array(),
            '',
            false,
            false,
            true,
            array(
                'generateValidAnswer',
            )
        );

        $gameRules->expects($this->any())
            ->method('generateValidAnswer')
            ->will($this->returnValue(new Answer('valid_answer')));

        return $gameRules;
    }
}
