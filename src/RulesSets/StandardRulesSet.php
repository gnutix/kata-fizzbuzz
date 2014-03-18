<?php

namespace FizzBuzz\RulesSets;

use FizzBuzz\AbstractRulesSet;
use FizzBuzz\Rules\BuzzNumberRule;
use FizzBuzz\Rules\FizzBuzzNumberRule;
use FizzBuzz\Rules\FizzNumberRule;
use FizzBuzz\Rules\StandardNumberRule;

/**
 * Standard Rules Set
 */
final class StandardRulesSet extends AbstractRulesSet
{
    /**
     * {@inheritDoc}
     */
    protected function loadRules()
    {
        $this->add(new FizzBuzzNumberRule());
        $this->add(new FizzNumberRule());
        $this->add(new BuzzNumberRule());
        $this->add(new StandardNumberRule());
    }
}
