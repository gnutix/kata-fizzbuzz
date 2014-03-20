<?php

namespace FizzBuzzDomain;

use GameDomain\Player\PlayerInterface;
use GameDomain\Round\AbstractRound;
use GameDomain\Round\Step\Step;
use GameDomain\Round\Step\StepResult;
use GameDomain\Round\Step\StepResultCollection;
use GameDomain\Rule\AbstractRulesSet;

/**
 * Round
 */
final class Round extends AbstractRound
{
    /**
     * {@inheritDoc}
     */
    public function play(AbstractRulesSet $gameRules)
    {
        $roundResult = new StepResultCollection();

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
     * @return \GameDomain\Round\Step\Step
     */
    protected function createStep()
    {
        return new Step($this->players->getPosition() + 1);
    }

    /**
     * @param \GameDomain\Rule\AbstractRulesSet  $gameRules
     * @param \GameDomain\Player\PlayerInterface $player
     * @param \GameDomain\Round\Step\Step        $step
     *
     * @return \GameDomain\Round\Step\StepResult
     */
    protected function createStepResult(AbstractRulesSet $gameRules, PlayerInterface $player, Step $step)
    {
        return new StepResult(
            $player,
            $player->play($gameRules, $step),
            $gameRules->generateValidAnswer($step->getRawValue()),
            $step
        );
    }
}
