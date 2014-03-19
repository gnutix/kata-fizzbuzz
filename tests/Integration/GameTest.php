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
    const MAX_STEPS = 100;

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
            2,
            'Hallo ?!',
        )
    );

    /**
     * Test playing the game
     */
    public function testPlayingTheGame()
    {
        $gameResult = $this->playTestGame();

        // Limit the results on the first round (as there's only perfect players)
        $gameResult->set(0, new RoundResult(array_values($gameResult->get(0)->slice(2, count($this->gameResult[0])))));

        foreach ($gameResult->toArray() as $roundId => $roundResult) {
            foreach ($roundResult->toArray() as $stepId => $stepResult) {
                $expectedAnswer = $this->gameResult[$roundId][$stepId];

                $this->assertTrue(
                    $stepResult->getPlayerAnswer()->isSameAs(new Answer($expectedAnswer)),
                    vsprintf(
                        'Round #%s, step #%s : player "%s" answered "%s", expected answer: "%s".',
                        array(
                            $roundId,
                            $stepId,
                            (string) $stepResult->getPlayer(),
                            (string) $stepResult->getPlayerAnswer(),
                            $expectedAnswer,
                        )
                    )
                );
            }
        }
    }

    /**
     * @return \FizzBuzz\Collections\GameResult
     */
    protected function playTestGame()
    {
        $game = new Game();
        $standardRulesSet = new StandardRulesSet();
        $rounds = new Rounds(
            array(
                new Round(
                    $standardRulesSet,
                    new \LimitIterator($this->getPerfectPlayers()->getInfiniteIterator(), 0, static::MAX_STEPS)
                ),
                new Round(
                    $standardRulesSet,
                    new \LimitIterator($this->getMixedPlayers()->getInfiniteIterator(), 0, static::MAX_STEPS)
                ),
            )
        );

        return $game->play($rounds);
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
        $players->add(new JohnDoe($chuckNorris, new FakeNumberGenerator(1)));
        $players->add(new Nabila());

        return $players;
    }
}
