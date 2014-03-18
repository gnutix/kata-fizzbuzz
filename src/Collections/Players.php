<?php

namespace FizzBuzz\Collections;

use Doctrine\Common\Collections\ArrayCollection;

use FizzBuzz\PlayerInterface;

/**
 * Players Collection
 *
 * @method PlayerInterface[] toArray()
 * @method PlayerInterface current()
 */
class Players extends ArrayCollection
{
}
