<?php

namespace Tests\Unit\GameDomain\Player\Players;

use GameDomain\Player\Players\StupidPlayer;

/**
 * StupidPlayer Test
 */
class StupidPlayerTest extends AbstractPlayerTest
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
        return new StupidPlayer();
    }
}
