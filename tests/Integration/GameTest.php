<?php

namespace Tests\Integration;

use FizzBuzz\Collections\GameResult;
use FizzBuzz\Collections\Players;
use FizzBuzz\Collections\Rounds;
use FizzBuzz\Game;
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
    /** @var array */
    protected $gameResult = array(
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
            'Hallo ?!',
        )
    );

    /**
     * Test playing the game
     */
    public function testPlayingTheGame()
    {
        $game = new Game();
        $standardRulesSet = new StandardRulesSet();
        $rounds = new Rounds(
            array(
                new Round($standardRulesSet, $this->getPerfectPlayers()),
                new Round($standardRulesSet, $this->getMixedPlayers()),
            )
        );

        $gameResult = $game->play($rounds);
        $gameResult->set(0, new GameResult($gameResult->get(0)->slice(2, $gameResult->get(0)->count())));

        for ($i = 0; $i < $rounds->count(); $i++) {
            $gameAnswersArray = $gameResult->toArray();

            foreach ($gameAnswersArray[$i]->toArray() as $index => $stepResult) {
                $this->assertEquals((string) $stepResult->getPlayerAnswer(), $this->gameResult[$i][$index]);
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
        $chuckNorris = new ChuckNorris();

        $players = new Players();
        $players->add($chuckNorris);
        $players->add(new Nabila());
        $players->add(new JohnDoe($chuckNorris));

        return $players;
    }
}
