<?php

namespace Tests\Integration;

use FizzBuzz\Collections\Players;
use FizzBuzz\Collections\RoundResult;
use FizzBuzz\Collections\Rounds;
use FizzBuzz\Entity\Answer;
use FizzBuzz\Game;
use FizzBuzz\NumberGenerators\FakeNumberGenerator;
use FizzBuzz\Players\ChuckNorris;
use FizzBuzz\Players\JohnDoe;
use FizzBuzz\Players\Nabila;
use FizzBuzz\Round;
use FizzBuzz\Rules\BuzzNumberRule;
use FizzBuzz\Rules\FizzBuzzNumberRule;
use FizzBuzz\Rules\FizzNumberRule;
use FizzBuzz\RulesSets\StandardRulesSet;

/**
 * Game Test
 */
class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function getRounds()
    {
        return array(
            array(
                new Rounds(
                    array(
                        new Round(
                            new \LimitIterator($this->getPerfectPlayers()->getInfiniteIterator(), 2, 16)
                        ),
                        new Round(
                            new \LimitIterator($this->getMixedPlayers()->getInfiniteIterator(), 0, PHP_INT_MAX)
                        ),
                    )
                ),
                array(
                    array(
                        FizzNumberRule::VALID_ANSWER,
                        4,
                        BuzzNumberRule::VALID_ANSWER,
                        FizzNumberRule::VALID_ANSWER,
                        7,
                        8,
                        FizzNumberRule::VALID_ANSWER,
                        BuzzNumberRule::VALID_ANSWER,
                        11,
                        FizzNumberRule::VALID_ANSWER,
                        13,
                        14,
                        FizzBuzzNumberRule::VALID_ANSWER,
                        16,
                        17,
                        FizzNumberRule::VALID_ANSWER,
                    ),
                    array(
                        1,
                        2,
                        'Hallo ?!',
                    ),
                )
            ),
        );
    }

    /**
     * Test playing the game
     *
     * @param \FizzBuzz\Collections\Rounds $rounds
     * @param array                        $expectedGameResult
     *
     * @dataProvider getRounds
     */
    public function testPlayingTheGame(Rounds $rounds, $expectedGameResult)
    {
        $game = new Game(new StandardRulesSet());
        $gameResult = $game->play($rounds);

        foreach ($gameResult->toArray() as $roundId => $roundResult) {
            foreach ($roundResult->toArray() as $stepId => $stepResult) {
                $expectedAnswer = $expectedGameResult[$roundId][$stepId];

                $this->assertTrue(
                    $stepResult->getPlayerAnswer()->isSameAs(new Answer($expectedAnswer)),
                    'Expected answer : '.$expectedAnswer.'. Step result : '.(string) $stepResult
                );
            }
        }
    }

    /**
     * @return \FizzBuzz\Collections\Players
     */
    protected function getPerfectPlayers()
    {
        $players = new Players();
        for ($i = 1; $i <= 3; $i++) {
            $players->add(new ChuckNorris());
        }

        return $players;
    }

    /**
     * @return \FizzBuzz\Collections\Players
     */
    protected function getMixedPlayers()
    {
        $players = new Players();
        $players->add(new ChuckNorris());
        $players->add(new JohnDoe(new FakeNumberGenerator(1)));
        $players->add(new Nabila());

        return $players;
    }
}
