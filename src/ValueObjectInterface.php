<?php

namespace FizzBuzz;

/**
 * Value Object Interface
 */
interface ValueObjectInterface
{
    /**
     * @param mixed $value
     */
    public function __construct($value);

    /**
     * @param ValueObjectInterface $value
     *
     * @return bool
     */
    public function isSameAs(ValueObjectInterface $value);

    /**
     * @return string
     */
    public function __toString();
}
