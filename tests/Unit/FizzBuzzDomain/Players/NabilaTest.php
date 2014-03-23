<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\Nabila;

/**
 * Nabila Test
 */
class NabilaTest extends AbstractFizzBuzzPlayerTest
{
    /**
     * {@inheritDoc}
     *
     * @dataProvider getSteps
     */
    public function testPlay($stepNumber)
    {
        $this->assertFalse($this->play($this->getPlayer(), $stepNumber));
    }

    /**
     * {@inheritDoc}
     */
    protected function getPlayer()
    {
        return new Nabila();
    }
}
