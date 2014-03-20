<?php

namespace Utils\NumberGenerator;

/**
 * Number Generator Interface
 */
interface NumberGeneratorInterface
{
    /**
     * @param int|null $min
     * @param int|null $max
     *
     * @return int
     */
    public function generate($min = null, $max = null);
}
