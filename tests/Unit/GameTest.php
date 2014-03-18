<?php

namespace Tests\Unit;

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
            FizzNumberRule::VALID_ANSWER
        ),
        array(
            1,
            '"Nabila" failed at round #2 with answer "Hallo ?!" (correct answer was "2").'
        )
    );

    /**
     * Test playing the game
     */
    public function testPlayingGame()
    {
        $game = new Game();
        $rounds = new Rounds();
        $standardRulesSet = new StandardRulesSet();

        // Add 3 perfect players to the game
        $players = new Players();
        for ($i = 1; $i <= 3; $i++) {
            $players->add(new ChuckNorris());
        }

        $rounds->add(new Round($standardRulesSet->getRules(), $players));

        $players = new Players();
        $players->add(new ChuckNorris());
        $players->add(new Nabila());

        $rounds->add(new Round($standardRulesSet->getRules(), $players));

        $gameResult = $game->play($rounds);
        $gameResult[0] = array_splice($gameResult[0], 2, 16);

        $this->assertEquals($this->gameResult, $gameResult);
    }
}
