<?php

namespace Utils\Domain;

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
     */
    public function isSameAs($value)
    {
        // If the given object is not an AbstractValueObject, we can't compare them
        if (!($value instanceof AbstractValueObject) || get_class($value) !== get_class($this)) {
            return false;
        }

        $rawValue = $this->getRawValue();
        $otherRawValue = $value->getRawValue();

        if (is_object($rawValue) && is_object($otherRawValue)) {

            // If the two objects are not instances of the same class, they are not the same
            if (get_class($rawValue) !== get_class($otherRawValue)) {
                return false;
            }

            // We use a loose-type comparison to compare objects, otherwise comparing two different instances of the
            // same object with the same properties/values would return false.
            return $rawValue == $otherRawValue;
        }

        return $rawValue === $otherRawValue;
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
        $rawValue = $this->getRawValue();

        if (is_object($rawValue) || is_array($rawValue)) {
            return json_encode($rawValue);
        }

        return (string) $rawValue;
    }
}
