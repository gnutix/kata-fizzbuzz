<?php

namespace FizzBuzzDomain\Rules\RulesSets;

use FizzBuzzDomain\Rules\BuzzNumberRule;
use FizzBuzzDomain\Rules\FizzBuzzNumberRule;
use FizzBuzzDomain\Rules\FizzNumberRule;
use FizzBuzzDomain\Rules\StandardNumberRule;
use GameDomain\Rule\AbstractRulesSet;

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
