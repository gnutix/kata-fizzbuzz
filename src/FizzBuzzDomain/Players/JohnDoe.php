<?php

namespace FizzBuzzDomain\Players;

use GameDomain\Player\PlayerInterface;
use GameDomain\Round\Step\Answer;
use GameDomain\Round\Step\Step;
use GameDomain\Rule\AbstractRulesSet;
use Utils\NumberGenerator\NumberGeneratorInterface;

/**
 * Standard Player: this player usually answers correctly, but sometimes fails.
 */
final class JohnDoe implements PlayerInterface
{
    /** @var \Utils\NumberGenerator\NumberGeneratorInterface */
    protected $numberGenerator;

    /**
     * @param \Utils\NumberGenerator\NumberGeneratorInterface $numberGenerator
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
