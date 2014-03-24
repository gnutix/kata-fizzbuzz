<?php

namespace Utils\Collections;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Infinite ArrayCollection
 */
class InfiniteArrayCollection extends ArrayCollection
{
    /**
     * @return \GameDomain\Player\PlayerInterface[]|\InfiniteIterator
     */
    final public function getInfiniteIterator()
    {
        $this->first();

        return new \InfiniteIterator($this->getIterator());
    }
}
