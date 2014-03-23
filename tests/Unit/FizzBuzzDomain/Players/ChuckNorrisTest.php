<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\ChuckNorris;

/**
 * ChuckNorris Test
 */
class ChuckNorrisTest extends AbstractPlayerTest
{
    /**
     * {@inheritDoc}
     *
     * @dataProvider getSteps
     */
    public function testPlay($stepNumber)
    {
        $this->assertTrue($this->play($this->getPlayer(), $stepNumber));
    }

    /**
     * {@inheritDoc}
     */
    protected function getPlayer()
    {
        return new ChuckNorris();
    }
}
