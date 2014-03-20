<?php

namespace FizzBuzz;

/**
 * Value Object
 */
abstract class AbstractValueObject
{
    /** @var mixed */
    protected $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param self $valueObject
     *
     * @return bool
     */
    public function isSameAs(self $valueObject)
    {
        return $this->getRawValue() === $valueObject->getRawValue();
    }

    /**
     * @return mixed
     */
    public function getRawValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
