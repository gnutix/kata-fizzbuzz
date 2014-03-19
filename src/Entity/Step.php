<?php

namespace FizzBuzz\Entity;

/**
 * Step
 */
class Step
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
     * @param \FizzBuzz\Entity\Step $step
     *
     * @return bool
     */
    public function isSameAs(Step $step)
    {
        return $this === $step;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->step;
    }
}
