<?php

namespace FizzBuzz\RulesSets;

use Doctrine\Common\Collections\ArrayCollection;

use FizzBuzz\Rules\BuzzNumberRule;
use FizzBuzz\Rules\FizzBuzzNumberRule;
use FizzBuzz\Rules\FizzNumberRule;
use FizzBuzz\Rules\StandardNumberRule;
use FizzBuzz\RulesSetInterface;

/**
 * Standard Rules Set
 */
final class StandardRulesSet extends ArrayCollection implements RulesSetInterface
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        $this->add(new FizzBuzzNumberRule());
        $this->add(new FizzNumberRule());
        $this->add(new BuzzNumberRule());
        $this->add(new StandardNumberRule());
    }
}
