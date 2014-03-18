<?php

namespace FizzBuzz;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Rules Set
 *
 * @method AbstractGameRule[] toArray()
 */
abstract class AbstractRulesSet extends ArrayCollection
{
    /**
     * {@inheritDoc}
     */
    public function __construct(array $elements = array())
    {
        parent::__construct($elements);

        $this->populateRulesSet();
    }

    /**
     * Populates the rules set
     */
    protected abstract function populateRulesSet();
}
