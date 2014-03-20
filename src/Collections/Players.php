<?php

namespace FizzBuzz\Collections;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Players Collection
 *
 * @method \FizzBuzz\PlayerInterface[] toArray()
 */
final class Players extends ArrayCollection
{
    /**
     * @return \FizzBuzz\PlayerInterface[]|\InfiniteIterator
     */
    public function getInfiniteIterator()
    {
        $this->first();

        return new \InfiniteIterator($this->getIterator());
    }
}
