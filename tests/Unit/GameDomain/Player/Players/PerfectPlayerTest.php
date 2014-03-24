<?php

namespace Tests\Unit\GameDomain\Player\Players;

use GameDomain\Player\Players\PerfectPlayer;

/**
 * PerfectPlayer Test
 */
class PerfectPlayerTest extends AbstractPlayerTest
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
        return new PerfectPlayer();
    }
}
