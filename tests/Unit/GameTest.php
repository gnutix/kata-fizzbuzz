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
    public function testGameStartRounds()
    {
        /** @var \FizzBuzz\RoundInterface|\PHPUnit_Framework_MockObject_MockObject $round */
        $round = $this->getMock('\FizzBuzz\RoundInterface');
        $rounds = new Rounds();

        $nbRounds = 3;
        for ($i = 1; $i <= $nbRounds; $i++) {
            $rounds->add($round);
        }

        $round->expects($this->exactly($nbRounds))->method('start');

        $this->assertTrue(is_array($this->sut->play($rounds)));
    }
}
