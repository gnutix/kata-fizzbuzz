<?php

namespace Utils\Collections;

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
