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
        $maxStep = new Step(static::MAX_STEPS);
        $this->roundResult = new RoundResult();

        foreach ($this->players->getInfiniteIterator() as $stepId => $player) {
            $step = new Step($stepId + 1);
            $playerAnswer = $player->play($this->gameRules, $step);
            $validAnswer = $this->gameRules->generateValidAnswer($step);
            $isPlayerAnswerValid = $playerAnswer->isSameAs($validAnswer);

            $this->roundResult->add(new StepResult($player, $playerAnswer, $validAnswer, $step, $isPlayerAnswerValid));

            if ($step->isSameAs($maxStep) || !$isPlayerAnswerValid) {
                break;
            }
        }

        return $this->roundResult;
    }
}
