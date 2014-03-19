<?php

namespace FizzBuzz;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;

/**
 * Step Result
 */
class StepResult
{
    /** @var \FizzBuzz\PlayerInterface */
    protected $player;

    /** @var \FizzBuzz\Entity\Answer */
    protected $playerAnswer;

    /** @var \FizzBuzz\Entity\Answer */
    protected $validAnswer;

    /** @var \FizzBuzz\Entity\Step */
    protected $step;

    /** @var bool */
    protected $isValid;

    /**
     * @param \FizzBuzz\PlayerInterface $player
     * @param \FizzBuzz\Entity\Answer   $playerAnswer
     * @param \FizzBuzz\Entity\Answer   $validAnswer
     * @param \FizzBuzz\Entity\Step     $step
     * @param bool                      $isValid
     *
     * @internal param \FizzBuzz\Entity\Answer $answer
     */
    public function __construct(
        PlayerInterface $player,
        Answer $playerAnswer,
        Answer $validAnswer,
        Step $step,
        $isValid
    ) {
        $this->player = $player;
        $this->playerAnswer = $playerAnswer;
        $this->validAnswer = $validAnswer;
        $this->step = $step;
        $this->isValid = $isValid;
    }

    /**
     * @return \FizzBuzz\PlayerInterface
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @return \FizzBuzz\Entity\Answer
     */
    public function getPlayerAnswer()
    {
        return $this->playerAnswer;
    }

    /**
     * @return \FizzBuzz\Entity\Answer
     */
    public function getValidAnswer()
    {
        return $this->validAnswer;
    }

    /**
     * @return \FizzBuzz\Entity\Step
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
        return (bool) $this->isValid;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->isValid) {
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
