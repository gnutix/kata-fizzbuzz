<?php

namespace FizzBuzz\Entity;

use FizzBuzz\ValueObjectInterface;

/**
 * Answer
 */
final class Answer implements ValueObjectInterface
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
     * {@inheritDoc}
     */
    public function isSameAs(ValueObjectInterface $valueObject)
    {
        return $this->getRawValue() === $valueObject->getRawValue();
    }

    /**
     * {@inheritDoc}
     */
    public function getRawValue()
    {
        return $this->answer;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return (string) $this->answer;
    }
}
