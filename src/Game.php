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
        $results = array();

        foreach ($rounds->toArray() as $round) {
            $results[] = $round->start();
        }

        return $results;
    }
}
