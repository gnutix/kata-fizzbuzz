<?php

namespace Tests\Unit\Utils\NumberGenerator\NumberGenerators;

use Utils\NumberGenerator\NumberGenerators\FakeNumberGenerator;

/**
 * FakeNumberGenerator Test
 */
class FakeNumberGeneratorTest extends \PHPUnit_Framework_TestCase
{
    const FAKE_RESULT = 1;

    /** @var \Utils\NumberGenerator\NumberGenerators\FakeNumberGenerator */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new FakeNumberGenerator(static::FAKE_RESULT);
    }

    /**
     * @dataProvider getRanges
     *
     * @param int $min
     * @param int $max
     */
    public function testRandomGeneration($min, $max)
    {
        $this->assertEquals(static::FAKE_RESULT, $this->sut->generate($min, $max));
    }

    /**
     * @return array
     */
    public function getRanges()
    {
        return array(
            array(null, null),
            array(0, 1),
            array(1, 10),
        );
    }
}
