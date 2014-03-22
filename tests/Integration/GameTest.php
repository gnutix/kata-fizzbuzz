<?php

namespace Tests\Integration;

use FizzBuzzDomain\Game;
use FizzBuzzDomain\Players\ChuckNorris;
use FizzBuzzDomain\Players\JohnDoe;
use FizzBuzzDomain\Players\Nabila;
use FizzBuzzDomain\Round;
use FizzBuzzDomain\Rules\BuzzNumberRule;
use FizzBuzzDomain\Rules\FizzBuzzNumberRule;
use FizzBuzzDomain\Rules\FizzNumberRule;
use FizzBuzzDomain\Rules\RulesSets\StandardRulesSet;
use GameDomain\Player\PlayerCollection;
use GameDomain\Round\RoundCollection;
use GameDomain\Round\Step\Answer;
use Utils\NumberGenerator\NumberGenerators\FakeNumberGenerator;

/**
 * Game Test
 */
class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testPlayingTheGame()
    {
        $game = new Game(new StandardRulesSet());
        $gameResult = $game->play($this->getRounds());
        $expectedGameResult = $this->getExpectedGameResults();

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
     * @return \GameDomain\Round\RoundCollection
     */
    protected function getRounds()
    {
        return new RoundCollection(
            array(
                new Round(new \LimitIterator($this->getPerfectPlayers()->getInfiniteIterator(), 9, 5)),
                new Round(new \LimitIterator($this->getMixedPlayers()->getInfiniteIterator(), 0, PHP_INT_MAX)),
            )
        );
    }

    /**
     * @return array
     */
    protected function getExpectedGameResults()
    {
        return array(
            array(
                BuzzNumberRule::VALID_ANSWER,
                11,
                FizzNumberRule::VALID_ANSWER,
                13,
                14,
                FizzBuzzNumberRule::VALID_ANSWER,
            ),
            array(1, 2, 'Hallo ?!'),
        );
    }

    /**
     * @return \GameDomain\Player\PlayerCollection
     */
    protected function getPerfectPlayers()
    {
        $players = new PlayerCollection();
        for ($i = 1; $i <= 3; $i++) {
            $players->add(new ChuckNorris());
        }

        return $players;
    }

    /**
     * @return \GameDomain\Player\PlayerCollection
     */
    protected function getMixedPlayers()
    {
        $players = new PlayerCollection();
        $players->add(new ChuckNorris());
        $players->add(new JohnDoe(new FakeNumberGenerator(1)));
        $players->add(new Nabila());

        return $players;
    }
}
