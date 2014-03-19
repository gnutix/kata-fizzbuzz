<?php

namespace FizzBuzz;

use FizzBuzz\Collections\RoundResult;
use FizzBuzz\Entity\Step;
use FizzBuzz\Collections\Players;

/**
 * Round
 */
final class Round implements RoundInterface
{
    const MAX_STEPS = 100;

    /** @var \FizzBuzz\AbstractRulesSet */
    protected $gameRules;

    /** @var \FizzBuzz\Collections\Players */
    protected $players;

    /** @var \FizzBuzz\Collections\RoundResult */
    protected $roundResult;

    /**
     * @param \FizzBuzz\AbstractRulesSet    $gameRules
     * @param \FizzBuzz\Collections\Players $players
     */
    public function __construct(AbstractRulesSet $gameRules, Players $players)
    {
        $this->gameRules = $gameRules;
        $this->players = $players;
    }

    /**
     * {@inheritDoc}
     */
    public function play()
    {
        $iterator = new \LimitIterator($this->players->getInfiniteIterator(), 0, static::MAX_STEPS);
        $this->roundResult = new RoundResult();

        foreach ($iterator as $player) {
            $stepResult = $this->createStepResult($player, new Step($iterator->getPosition() + 1));

            $this->roundResult->add($stepResult);

            if (!$stepResult->isValid()) {
                break;
            }
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
        $validAnswer = $this->gameRules->generateValidAnswer($step);

        return new StepResult($player, $playerAnswer, $validAnswer, $step, $playerAnswer->isSameAs($validAnswer));
    }
}
