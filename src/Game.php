<?php

namespace FizzBuzz;

use FizzBuzz\Collections\GameResult;
use FizzBuzz\Collections\Rounds;

/**
 * Game
 */
final class Game
{
    /** @var \FizzBuzz\AbstractRulesSet */
    protected $gameRules;

    /**
     * {@inheritDoc}
     */
    public function __construct(AbstractRulesSet $gameRules)
    {
        $this->gameRules = $gameRules;
    }

    /**
     * {@inheritDoc}
     */
    public function play(Rounds $rounds)
    {
        $gameRules = $this->gameRules;

        return new GameResult(
            array_map(
                function (AbstractRound $round) use ($gameRules) {
                    return $round->play($gameRules);
                },
                $rounds->toArray()
            )
        );
    }
}
