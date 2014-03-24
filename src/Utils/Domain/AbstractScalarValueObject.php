<?php

namespace Utils\Domain;

/**
 * Scalar Value Object
 */
abstract class AbstractScalarValueObject implements ValueObjectInterface
{
    /** @var mixed */
    protected $value;

    /**
     * {@inheritDoc}
     */
    final public function __construct($value)
    {
        $this->guardAgainstNonScalar($value);

        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    final public function isSameAs($value)
    {
        // If the given object is not an AbstractScalarValueObject, we can't compare them
        if (!$this->areObjectsOfSameType($this, $value)) {
            return false;
        }

        return $this->getRawValue() === $value->getRawValue();
    }

    /**
     * {@inheritDoc}
     */
    final public function getRawValue()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    final public function __toString()
    {
        return (string) $this->getRawValue();
    }

    /**
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    final protected function guardAgainstNonScalar($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException(
                'Value objects does not accept non-scalar values such as '.gettype($value)
            );
        }
    }

    /**
     * @param mixed $value1
     * @param mixed $value2
     *
     * @return bool
     */
    final protected function areObjectsOfSameType($value1, $value2)
    {
        return is_object($value1) && is_object($value2) && (get_class($value1) === get_class($value2));
    }
}
