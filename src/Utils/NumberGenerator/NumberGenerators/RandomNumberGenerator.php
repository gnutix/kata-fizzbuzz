<?php

namespace Utils\NumberGenerator\NumberGenerators;

use Utils\NumberGenerator\NumberGeneratorInterface;

/**
 * Random Number Generator
 */
final class RandomNumberGenerator implements NumberGeneratorInterface
{
    /**
     * {@inheritDoc}
     */
    public function generate($min = null, $max = null)
    {
        return mt_rand($min, $max);
    }
}
