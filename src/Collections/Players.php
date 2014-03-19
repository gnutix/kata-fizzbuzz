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
final class Players extends ArrayCollection
{
}
