<?php

namespace FizzBuzz\RulesSets;

use FizzBuzz\Collections\GameRules;
use FizzBuzz\Rules\BuzzNumberRule;
use FizzBuzz\Rules\FizzBuzzNumberRule;
use FizzBuzz\Rules\FizzNumberRule;
use FizzBuzz\Rules\StandardNumberRule;

/**
 * Standard Rules Sets
 */
final class StandardRulesSet extends GameRules
{
    /**
     * {@inheritDoc}
     */
    public function __construct(array $elements = array())
    {
        parent::__construct($elements);

        $this->add(new FizzBuzzNumberRule());
        $this->add(new FizzNumberRule());
        $this->add(new BuzzNumberRule());
        $this->add(new StandardNumberRule());
    }
}
