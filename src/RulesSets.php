<?php

namespace FizzBuzz;

use FizzBuzz\Collections\GameRules;
use FizzBuzz\Rules\BuzzNumberRule;
use FizzBuzz\Rules\FizzBuzzNumberRule;
use FizzBuzz\Rules\FizzNumberRule;
use FizzBuzz\Rules\StandardNumberRule;

/**
 * Rules Sets
 */
final class RulesSets
{
    /** @var \FizzBuzz\Collections\GameRules */
    protected $gameRules;

    /**
     * {@inheritDoc}
     */
    public function __construct(GameRules $gameRules)
    {
        $this->gameRules = $gameRules;
    }

    /**
     * @return \FizzBuzz\Collections\GameRules
     */
    public function getStandard()
    {
        $gameRules = $this->getEmptyGameRulesCollection();
        $gameRules->add(new FizzBuzzNumberRule());
        $gameRules->add(new FizzNumberRule());
        $gameRules->add(new BuzzNumberRule());
        $gameRules->add(new StandardNumberRule());

        return $gameRules;
    }

    /**
     * @return \FizzBuzz\Collections\GameRules
     */
    protected function getEmptyGameRulesCollection()
    {
        $gameRules = clone $this->gameRules;
        $gameRules->clear();

        return $gameRules;
    }
}
