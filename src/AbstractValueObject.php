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
     * @param self $value
     *
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function isSameAs($value)
    {
        if (!($value instanceof static)) {
            throw new \InvalidArgumentException(
                'You can only compare a ValueObject with another ValueObject of the same type.'
            );
        }

        return $this->getRawValue() === $value->getRawValue();
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
