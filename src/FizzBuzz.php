<?php

namespace FizzBuzz;

/**
 * Fizz Buzz
 */
final class FizzBuzz
{
    const FIZZ = 'Fizz';
    const BUZZ = 'Buzz';
    const FIZZ_BUZZ = 'FizzBuzz';

    /**
     * @param Game $game
     *
     * @return array
     */
    public function play(Game $game)
    {
        $result = array();
        $stop = ($game->getStart() + $game->getRounds());

        for ($i = $game->getStart(); $i < $stop; $i++) {
            switch ($i) {
                case 0 === ($i % 3) && 0 === ($i % 5):
                    $result[] = self::FIZZ_BUZZ;
                    break;
                case 0 === ($i % 3):
                    $result[] = self::FIZZ;
                    break;
                case 0 === ($i % 5):
                    $result[] = self::BUZZ;
                    break;
                default:
                    $result[] = $i;
            }
        }

        return $result;
    }
}
