<?php

namespace FizzBuzz\Entity;

use FizzBuzz\ValueObjectInterface;

/**
 * Step
 */
final class Step implements ValueObjectInterface
{
    /** @var int */
    protected $step;

    /**
     * {@inheritDoc}
     */
    public function __construct($step)
    {
        $this->step = $step;
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
        return $this->step;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return (string) $this->step;
    }
}
