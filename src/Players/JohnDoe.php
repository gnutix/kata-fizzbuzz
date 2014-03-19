<?php

namespace FizzBuzz\Players;

use FizzBuzz\AbstractRulesSet;
use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\PlayerInterface;

/**
 * Standard Player: this player usually answers correctly, but sometimes fails.
 */
final class JohnDoe implements PlayerInterface
{
    /** @var \FizzBuzz\Players\ChuckNorris */
    protected $player;

    /**
     * @param \FizzBuzz\Players\ChuckNorris $player
     */
    public function __construct(ChuckNorris $player)
    {
        $this->player = $player;
    }

    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules, Step $step)
    {
        if (0 === mt_rand(0, 1)) {
            return new Answer('?');
        }

        return $this->player->play($gameRules, $step);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'John Doe';
    }
}
