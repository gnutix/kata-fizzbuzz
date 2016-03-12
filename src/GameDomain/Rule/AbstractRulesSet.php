<?php

namespace GameDomain\Rule;

use GameDomain\Exceptions\IrrelevantRuleException;
use Utils\Collections\ArrayCollection;

/**
 * Rules Set
 *
 * @method AbstractRule[] toArray()
 */
abstract class AbstractRulesSet extends ArrayCollection
{
    /**
     * Constructor
     */
    final public function __construct()
    {
        $this->loadRules();
    }

    /**
     * @param int $number
     *
     * @return \GameDomain\Round\Step\Answer
     * @throws \DomainException
     */
    final public function generateValidAnswer($number)
    {
        foreach ($this->toArray() as $gameRule) {
            try {
                return $gameRule->generateValidAnswer($number);
            } catch (IrrelevantRuleException $exception) {
                continue;
            }
        }

        throw new \DomainException('No valid answer can be generated from the current rules set.');
    }

    /**
     * Loads the rules
     */
    abstract protected function loadRules();
}
