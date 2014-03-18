<?php

namespace FizzBuzz;

use FizzBuzz\Collections\Players;
use FizzBuzz\Exceptions\IrrelevantGameRule;

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

    /** @var array */
    protected $roundAnswers = array();

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
    public function start()
    {
        $this->players->first();

        for ($step = 1; $step <= static::MAX_STEPS; $step++) {
            $playerAnswer = $this->players->current()->play($this->gameRules, $step);

            if (false === ($validAnswer = $this->validatePlayerAnswer($playerAnswer, $step))) {
                $this->terminate($this->players->current(), $playerAnswer, $this->getValidAnswer($step), $step);

                break;
            }

            $this->roundAnswers[] = $validAnswer;

            if (!$this->players->next()) {
                $this->players->first();
            }
        }

        return $this->roundAnswers;
    }

    /**
     * {@inheritDoc}
     */
    public function terminate(PlayerInterface $player, $playerAnswer, $validAnswer, $step)
    {
        $this->roundAnswers[] = vsprintf(
            '"%s" failed at round #%s with answer "%s" (correct answer was "%s").',
            array(
                (string) $player,
                $step,
                $playerAnswer,
                $validAnswer
            )
        );
    }

    /**
     * @param string|null $playerAnswer
     * @param int         $step
     *
     * @return bool
     */
    protected function validatePlayerAnswer($playerAnswer, $step)
    {
        foreach ($this->gameRules->toArray() as $gameRule) {
            try {
                if ($gameRule->isSatisfiedBy($step, $playerAnswer)) {
                    return $playerAnswer;
                }
            } catch (IrrelevantGameRule $exception) {
                continue;
            }
        }

        return false;
    }

    /**
     * @param int $step
     *
     * @return null|string
     * @throws \DomainException
     */
    protected function getValidAnswer($step)
    {
        foreach ($this->gameRules->toArray() as $gameRule) {
            try {
                return $gameRule->generateValidAnswer($step);
            } catch (IrrelevantGameRule $exception) {
                continue;
            }
        }

        throw new \DomainException('The round cannot generate a valid answer based on the given game rules.');
    }
}
