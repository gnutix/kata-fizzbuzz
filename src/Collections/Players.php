<?php

namespace FizzBuzz\Collections;

use Doctrine\Common\Collections\ArrayCollection;
use FizzBuzz\PlayerInterface;

/**
 * Players Collection
 *
 * @method PlayerInterface[] toArray()
 */
final class Players extends ArrayCollection
{
    /**
     * @return PlayerInterface[]|\InfiniteIterator
     */
    public function getInfiniteIterator()
    {
        $this->first();

        return new \InfiniteIterator($this->getIterator());
    }
}
