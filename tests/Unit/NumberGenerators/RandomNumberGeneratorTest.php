<?php

namespace Tests\Unit\NumberGenerators;

use FizzBuzz\NumberGenerators\RandomNumberGenerator;

/**
 * RandomNumberGenerator Test
 */
class RandomNumberGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzz\NumberGenerators\RandomNumberGenerator */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new RandomNumberGenerator();
    }

    /**
     * @dataProvider getRanges
     */
    public function testRandomGeneration($min, $max)
    {
        $generatedNumber = $this->sut->generate($min, $max);

        $this->assertTrue(in_array($generatedNumber, range($min, $max)));
    }

    /**
     * @return array
     */
    public function getRanges()
    {
        return array(
            array(0, 1),
            array(1, 10),
            array(10, 1),
        );
    }
}
