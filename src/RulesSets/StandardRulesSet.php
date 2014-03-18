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
final class StandardRulesSet
{
    /** @var \FizzBuzz\Collections\GameRules */
    protected $gameRules;

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        $this->gameRules = new GameRules();

        $this->gameRules->add(new FizzBuzzNumberRule());
        $this->gameRules->add(new FizzNumberRule());
        $this->gameRules->add(new BuzzNumberRule());
        $this->gameRules->add(new StandardNumberRule());
    }

    /**
     * @return \FizzBuzz\Collections\GameRules
     */
    public function getRules()
    {
        return $this->gameRules;
    }
}
