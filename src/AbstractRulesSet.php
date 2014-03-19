<?php

namespace FizzBuzz;

use Doctrine\Common\Collections\ArrayCollection;
use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * Abstract Rules Set
 *
 * @method AbstractGameRule[] toArray()
 */
abstract class AbstractRulesSet extends ArrayCollection
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loadRules();
    }

    /**
     * Loads the rules into the collection
     *
     * @codeCoverageIgnore
     */
    abstract protected function loadRules();

    /**
     * @param int $number
     *
     * @return \FizzBuzz\Entity\Answer
     * @throws \DomainException
     */
    public function generateValidAnswer($number)
    {
        foreach ($this->toArray() as $gameRule) {
            try {
                return $gameRule->generateValidAnswer($number);
            } catch (IrrelevantGameRule $exception) {
                continue;
            }
        }

        throw new \DomainException('No valid answer can be generated from the current rules set.');
    }
}
