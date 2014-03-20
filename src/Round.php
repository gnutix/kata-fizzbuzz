<?php

namespace FizzBuzz;

use FizzBuzz\Collections\RoundResult;
use FizzBuzz\Entity\Step;

/**
 * Round
 */
final class Round implements RoundInterface
{
    /** @var \LimitIterator */
    protected $players;

    /**
     * @param \LimitIterator $players
     */
    public function __construct(\LimitIterator $players)
    {
        $this->players = $players;
    }

    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules)
    {
        $roundResult = new RoundResult();

        foreach ($this->players as $player) {
            $stepResult = $this->createStepResult($gameRules, $player, $this->createStep());
            $roundResult->add($stepResult);

            if (!$stepResult->isValid()) {
                break;
            }
        }

        return $roundResult;
    }

    /**
     * @return \FizzBuzz\Entity\Step
     */
    protected function createStep()
    {
        return new Step($this->players->getPosition() + 1);
    }

    /**
     * @param \FizzBuzz\AbstractRulesSet $gameRules
     * @param \FizzBuzz\PlayerInterface  $player
     * @param \FizzBuzz\Entity\Step      $step
     *
     * @return \FizzBuzz\StepResult
     */
    protected function createStepResult(AbstractRulesSet $gameRules, PlayerInterface $player, Step $step)
    {
        $playerAnswer = $player->play($gameRules, $step);
        $validAnswer = $gameRules->generateValidAnswer($step->getRawValue());

        return new StepResult($player, $playerAnswer, $validAnswer, $step, $playerAnswer->isSameAs($validAnswer));
    }
}
