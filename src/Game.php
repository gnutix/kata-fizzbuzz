<?php

namespace FizzBuzz;

use FizzBuzz\Collections\GameResult;
use FizzBuzz\Collections\Rounds;

/**
 * Game
 */
final class Game
{
    /**
     * @param \FizzBuzz\Collections\Rounds $rounds
     *
     * @return \FizzBuzz\Collections\GameResult
     */
    public function play(Rounds $rounds)
    {
        return new GameResult(
            array_map(
                function (RoundInterface $round) {
                    return $round->play();
                },
                $rounds->toArray()
            )
        );
    }
}
