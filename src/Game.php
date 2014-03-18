<?php

namespace FizzBuzz;

use FizzBuzz\Collections\Rounds;

/**
 * Game
 */
final class Game
{
    /**
     * @param \FizzBuzz\Collections\Rounds $rounds
     *
     * @return array
     */
    public function play(Rounds $rounds)
    {
        return array_map(
            function (RoundInterface $round) {
                return $round->start();
            },
            $rounds->toArray()
        );
    }
}
