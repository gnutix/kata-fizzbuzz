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
    /** @var \FizzBuzz\NumberGeneratorInterface */
    protected $numberGenerator;

    /**
     * @param \FizzBuzz\NumberGeneratorInterface $numberGenerator
     */
    public function __construct(NumberGeneratorInterface $numberGenerator)
    {
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

        return $gameRules->generateValidAnswer($step->getRawValue());
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'John Doe';
    }
}
