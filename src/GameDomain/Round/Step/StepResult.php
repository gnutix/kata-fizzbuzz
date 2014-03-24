<?php

namespace GameDomain\Round\Step;

use GameDomain\Player\PlayerInterface;

/**
 * Step Result
 */
final class StepResult
{
    /** @var \GameDomain\Player\PlayerInterface */
    protected $player;

    /** @var \GameDomain\Round\Step\Answer */
    protected $playerAnswer;

    /** @var \GameDomain\Round\Step\Answer */
    protected $validAnswer;

    /** @var \GameDomain\Round\Step\Step */
    protected $step;

    /**
     * @param \GameDomain\Player\PlayerInterface $player
     * @param \GameDomain\Round\Step\Answer      $playerAnswer
     * @param \GameDomain\Round\Step\Answer      $validAnswer
     * @param \GameDomain\Round\Step\Step        $step
     */
    public function __construct(
        PlayerInterface $player,
        Answer $playerAnswer,
        Answer $validAnswer,
        Step $step
    ) {
        $this->player = $player;
        $this->playerAnswer = $playerAnswer;
        $this->validAnswer = $validAnswer;
        $this->step = $step;
    }

    /**
     * @return \GameDomain\Player\PlayerInterface
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @return \GameDomain\Round\Step\Answer
     */
    public function getPlayerAnswer()
    {
        return $this->playerAnswer;
    }

    /**
     * @return \GameDomain\Round\Step\Answer
     */
    public function getValidAnswer()
    {
        return $this->validAnswer;
    }

    /**
     * @return \GameDomain\Round\Step\Step
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->playerAnswer->isSameAs($this->validAnswer);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->isValid()) {
            return vsprintf(
                'Player "%s" correctly answered "%s" at round #%s.',
                array(
                    (string) $this->player,
                    (string) $this->playerAnswer,
                    (string) $this->step,
                )
            );
        }

        return vsprintf(
            'Player "%s" failed by answering "%s" at round #%s. Correct answer was "%s".',
            array(
                (string) $this->player,
                (string) $this->playerAnswer,
                (string) $this->step,
                (string) $this->validAnswer,
            )
        );
    }
}
