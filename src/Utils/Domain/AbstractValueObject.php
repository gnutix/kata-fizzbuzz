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
        if (!$this->areObjectsOfSameType($this, $value)) {
            return false;
        }

        $rawValue = $this->getRawValue();
        $otherRawValue = $value->getRawValue();

        // We use a loose-type comparison to compare objects, otherwise comparing two different instances of the
        // same object with the same properties/values would return false.
        if ($this->areObjectsOfSameType($rawValue, $otherRawValue)) {
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

    /**
     * @param mixed $value1
     * @param mixed $value2
     *
     * @return bool
     */
    protected function areObjectsOfSameType($value1, $value2)
    {
        return (is_object($value1) && is_object($value2)) && (get_class($value1) === get_class($value2));
    }
}
