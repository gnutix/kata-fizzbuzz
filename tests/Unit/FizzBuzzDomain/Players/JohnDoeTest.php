<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\JohnDoe;
use Tests\Unit\GameDomain\Player\Players\AbstractPlayerTest;
use Utils\NumberGenerator\NumberGenerators\FakeNumberGenerator;

/**
 * JohnDoe Test
 */
class JohnDoeTest extends AbstractPlayerTest
{
    /**
     * {@inheritDoc}
     *
     * @dataProvider getSteps
     */
    public function testPlay($stepNumber)
    {
        $this->assertTrue($this->play($this->getPlayer(), $stepNumber));
        $this->assertFalse($this->play($this->getLosingPlayer(), $stepNumber));
    }

    /**
     * {@inheritDoc}
     */
    protected function getPlayer()
    {
        return new JohnDoe(new FakeNumberGenerator(1));
    }

    /**
     * @return \FizzBuzzDomain\Players\JohnDoe
     */
    protected function getLosingPlayer()
    {
        return new JohnDoe(new FakeNumberGenerator(0));
    }
}
