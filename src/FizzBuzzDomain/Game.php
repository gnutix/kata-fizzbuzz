<?php

namespace FizzBuzzDomain;

use GameDomain\Game\AbstractGame;
use GameDomain\Round\AbstractRound;
use GameDomain\Round\RoundResultCollection;
use GameDomain\Round\RoundCollection;

/**
 * Game
 */
final class Game extends AbstractGame
{
    /**
     * {@inheritDoc}
     */
    public function play(RoundCollection $rounds)
    {
        $gameRules = $this->gameRules;

        return new RoundResultCollection(
            array_map(
                function (AbstractRound $round) use ($gameRules) {
                    return $round->play($gameRules);
                },
                $rounds->toArray()
            )
        );
    }
}
