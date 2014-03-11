<?php

namespace Tests\Unit;

use FizzBuzz\Game;
use FizzBuzz\FizzBuzz;

/**
 * Fizz Buzz Test
 */
class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzz\FizzBuzz */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new FizzBuzz();
    }

    /**
     * @param \FizzBuzz\Game $game
     * @param array          $expectedResult
     *
     * @dataProvider getFizzBuzzData
     */
    public function testFizzBuzz(Game $game, array $expectedResult)
    {
        $this->assertEquals(array_values($expectedResult), array_values($this->sut->play($game)));
    }

    /**
     * @return array
     */
    public function getFizzBuzzData()
    {
        return array(
            array(
                new Game(3, 16),
                array(
                    FizzBuzz::FIZZ,
                    4,
                    FizzBuzz::BUZZ,
                    FizzBuzz::FIZZ,
                    7,
                    8,
                    FizzBuzz::FIZZ,
                    FizzBuzz::BUZZ,
                    11,
                    FizzBuzz::FIZZ,
                    13,
                    14,
                    FizzBuzz::FIZZ_BUZZ,
                    16,
                    17,
                    FizzBuzz::FIZZ
                ),
            ),
        );
    }
}
