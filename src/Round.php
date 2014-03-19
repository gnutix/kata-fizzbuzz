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
        $this->roundResult = new RoundResult();

        for ($stepId = 1; $stepId <= static::MAX_STEPS; $stepId++) {
            $step = new Step($stepId);
            $player = $this->players->current();
            $playerAnswer = $player->play($this->gameRules, $step);
            $validAnswer = $this->gameRules->generateValidAnswer($step);
            $isPlayerAnswerValid = $playerAnswer->isSameAs($validAnswer);

            $this->roundResult->add(new StepResult($player, $playerAnswer, $validAnswer, $step, $isPlayerAnswerValid));

            // Stop the round upon failure
            if (false === $isPlayerAnswerValid) {
                return $this->roundResult;
            }

            // Iterate over players
            if (!$this->players->next()) {
                $this->players->first();
            }
        }

        return $this->roundResult;
    }
}
