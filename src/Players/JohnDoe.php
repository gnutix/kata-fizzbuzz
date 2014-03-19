<?php

namespace FizzBuzz\Players;

use FizzBuzz\AbstractRulesSet;
use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\NumberGeneratorInterface;
use FizzBuzz\PlayerInterface;

/**
 * Standard Player: this player usually answers correctly, but sometimes fails.
 */
final class JohnDoe implements PlayerInterface
{
    /** @var \FizzBuzz\Players\ChuckNorris */
    protected $player;

    /** @var \FizzBuzz\NumberGeneratorInterface */
    protected $numberGenerator;

    /**
     * @param \FizzBuzz\Players\ChuckNorris      $player
     * @param \FizzBuzz\NumberGeneratorInterface $numberGenerator
     */
    public function __construct(ChuckNorris $player, NumberGeneratorInterface $numberGenerator)
    {
        $this->player = $player;
        $this->numberGenerator = $numberGenerator;
    }

    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules, Step $step)
    {
        if (0 === $this->numberGenerator->generate(0, 1)) {
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
