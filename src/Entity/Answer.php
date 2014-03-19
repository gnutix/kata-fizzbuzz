<?php

namespace FizzBuzz\Entity;

/**
 * Answer
 */
class Answer
{
    /** @var mixed */
    protected $answer;

    /**
     * {@inheritDoc}
     */
    public function __construct($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @param \FizzBuzz\Entity\Answer $answer
     *
     * @return bool
     */
    public function isSameAs(Answer $answer)
    {
        return $this === $answer;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return (string) $this->answer;
    }
}
