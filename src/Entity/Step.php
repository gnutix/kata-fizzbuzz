<?php

namespace FizzBuzz\Entity;

use FizzBuzz\ValueObjectInterface;

/**
 * Step
 */
class Step implements ValueObjectInterface
{
    /** @var int */
    protected $step;

    /**
     * @param int $step
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
        return $this === $valueObject;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return (string) $this->step;
    }
}
