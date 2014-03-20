<?php

namespace FizzBuzz;

use FizzBuzz\Collections\RoundResult;
use FizzBuzz\Entity\Step;

/**
 * Round
 */
final class Round implements RoundInterface
{
    /** @var \FizzBuzz\AbstractRulesSet */
    protected $gameRules;

    /** @var \Iterator */
    protected $iterator;

    /** @var \FizzBuzz\Collections\RoundResult */
    protected $roundResult;

    /**
     * @param \FizzBuzz\AbstractRulesSet $gameRules
     * @param \Iterator                  $iterator
     */
    public function __construct(AbstractRulesSet $gameRules, \Iterator $iterator)
    {
        $this->gameRules = $gameRules;
        $this->iterator = $iterator;
    }

    /**
     * {@inheritDoc}
     */
    public function play()
    {
        $this->roundResult = new RoundResult();

        $stepId = 1;
        foreach ($this->iterator as $player) {
            $stepResult = $this->createStepResult($player, new Step($stepId));
            $this->roundResult->add($stepResult);

            if (!$stepResult->isValid()) {
                break;
            }

            ++$stepId;
        }

        return $this->roundResult;
    }

    /**
     * @param \FizzBuzz\PlayerInterface $player
     * @param \FizzBuzz\Entity\Step     $step
     *
     * @return \FizzBuzz\StepResult
     */
    protected function createStepResult(PlayerInterface $player, Step $step)
    {
        $playerAnswer = $player->play($this->gameRules, $step);
        $validAnswer = $this->gameRules->generateValidAnswer($step->getRawValue());

        return new StepResult($player, $playerAnswer, $validAnswer, $step);
    }
}
