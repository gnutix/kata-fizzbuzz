<?php

namespace Tests\Unit;

use FizzBuzz\Collections\Rounds;
use FizzBuzz\Game;

/**
 * Game Test
 */
class GameTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzz\Game */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new Game();
    }

    /**
     * @test
     */
    public function testGameStartsEveryRounds()
    {
        $round = $this->getMock('\FizzBuzz\RoundInterface');
        $rounds = new Rounds();

        for ($i = 1, $nbRounds = 3; $i <= $nbRounds; $i++) {
            $rounds->add($round);
        }

        $round->expects($this->exactly($nbRounds))->method('start');

        $this->assertTrue(is_array($this->sut->play($rounds)));
    }
}
