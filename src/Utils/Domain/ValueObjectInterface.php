<?php

namespace Utils\Domain;

/**
 * ValueObject Interface
 */
interface ValueObjectInterface
{
    /**
     * @param mixed $value
     */
    public function __construct($value);

    /**
     * @param self $value
     *
     * @return bool
     */
    public function isSameAs($value);

    /**
     * @return mixed
     */
    public function getRawValue();

    /**
     * @return string
     */
    public function __toString();
}
