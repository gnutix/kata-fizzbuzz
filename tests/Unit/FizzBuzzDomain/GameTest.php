<?php

namespace Tests\Unit\FizzBuzzDomain;

use FizzBuzzDomain\Game;
use FizzBuzzDomain\Rules\RulesSets\StandardRulesSet;
use GameDomain\Round\RoundCollection;
use GameDomain\Round\RoundResultCollection;
use GameDomain\Round\Step\StepResultCollection;

/**
 * Game Test
 */
class GameTest extends \PHPUnit_Framework_TestCase
{
    const NB_ROUNDS = 3;

    /** @var \FizzBuzzDomain\Game */
    protected $sut;

    /** @var \GameDomain\Round\RoundCollection */
    protected $roundMockCollection;

    /** @var \GameDomain\Rule\AbstractRulesSet */
    protected $rulesSet;

    /** @var \GameDomain\Round\AbstractRound|\PHPUnit_Framework_MockObject_MockObject */
    protected $roundMock;

    /** @var \GameDomain\Round\RoundResultCollection */
    protected $roundResultCollection;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->roundMock = $this->getMockForAbstractClass(
            '\GameDomain\Round\AbstractRound',
            array(),
            '',
            false,
            false,
            true,
            array('play')
        );
        $this->roundMockCollection = new RoundCollection(array_fill(0, static::NB_ROUNDS, $this->roundMock));
        $this->roundResultCollection = new RoundResultCollection(
            array_fill(0, static::NB_ROUNDS, new StepResultCollection())
        );

        $this->rulesSet = new StandardRulesSet();
        $this->sut = new Game($this->rulesSet);
    }

    /**
     * @test
     */
    public function testPlayingTheGame()
    {
        $this->roundMock->expects($this->exactly(static::NB_ROUNDS))
            ->method('play')
            ->with($this->rulesSet)
            ->will($this->returnValue($this->roundResultCollection));

        $gameResult = $this->sut->play($this->roundMockCollection);

        $this->assertInstanceOf('\GameDomain\Round\RoundResultCollection', $gameResult);
        $this->assertCount(static::NB_ROUNDS, $gameResult);
    }
}
