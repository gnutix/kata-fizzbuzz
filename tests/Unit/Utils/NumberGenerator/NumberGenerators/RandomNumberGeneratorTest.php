<?php

namespace Tests\Unit\Utils\NumberGenerator\NumberGenerators;

use Utils\NumberGenerator\NumberGenerators\RandomNumberGenerator;

/**
 * RandomNumberGenerator Test
 */
class RandomNumberGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Utils\NumberGenerator\NumberGenerators\RandomNumberGenerator */
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
        $this->assertTrue(in_array($this->sut->generate($min, $max), range($min, $max)));
    }

    /**
     * @return array
     */
    public function getRanges()
    {
        return array(
            array(0, 1),
            array(1, 10),
        );
    }
}
