<?php

namespace FizzBuzzDomain\Players;

use GameDomain\Player\Players\PerfectPlayer;

/**
 * Chuck Norris
 */
final class ChuckNorris extends PerfectPlayer
{
    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return 'Chuck Norris';
    }
}
