<?php

namespace Tests\Unit;

use FizzBuzz\Collections\Rounds;
use FizzBuzz\Game;
use FizzBuzz\RulesSets\StandardRulesSet;

/**
 * Game Test
 */
class GameTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzz\Game */
    protected $sut;

    /** @var \FizzBuzz\AbstractRulesSet */
    protected $rules;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->rules = new StandardRulesSet();
        $this->sut = new Game($this->rules);
    }

    /**
     * @test
     */
    public function testGameStartsEveryRounds()
    {
        $round = $this->getMockForAbstractClass(
            '\FizzBuzz\AbstractRound',
            array(),
            '',
            false,
            false,
            true,
            array(
                'play',
            )
        );
        $rounds = new Rounds();

        for ($i = 1, $nbRounds = 3; $i <= $nbRounds; $i++) {
            $rounds->add($round);
        }

        $round->expects($this->exactly($nbRounds))->method('play')->with($this->rules);

        $gameResult = $this->sut->play($rounds);

        $this->assertInstanceOf('FizzBuzz\Collections\GameResult', $gameResult);
        $this->assertCount(3, $gameResult);
    }
}
