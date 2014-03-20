<?php

namespace Tests\Unit\FizzBuzzDomain\Rules\RulesSets;

use Doctrine\Common\Collections\ArrayCollection;
use FizzBuzzDomain\Rules\BuzzNumberRule;
use FizzBuzzDomain\Rules\FizzBuzzNumberRule;
use FizzBuzzDomain\Rules\FizzNumberRule;
use FizzBuzzDomain\Rules\RulesSets\StandardRulesSet;
use FizzBuzzDomain\Rules\StandardNumberRule;

/**
 * StandardRulesSet Test
 */
class StandardRulesSetTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Rules\RulesSets\StandardRulesSet */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new StandardRulesSet();
    }

    /**
     * @covers \GameDomain\Rule\AbstractRulesSet::loadRules
     */
    public function testStandardRulesAreLoaded()
    {
        // Ensure the same number of rules are defined
        $this->assertCount($this->getExpectedRules()->count(), $this->sut);

        // Ensure every rules are defined
        foreach ($this->getExpectedRules() as $rule) {
            $this->assertTrue(in_array($rule, $this->sut->toArray()));
        }

        // Ensure rules having a critical order are at the right position
        $this->assertEquals($this->getExpectedRules()->first(), $this->sut->first());
        $this->assertEquals($this->getExpectedRules()->last(), $this->sut->last());

        // Ensure rules can generate valid answers
        foreach ($this->getExpectedAnswers() as $number => $answer) {
            $this->assertEquals($answer, $this->sut->generateValidAnswer($number)->getRawValue());
        }
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    protected function getExpectedRules()
    {
        return new ArrayCollection(
            array(
                new FizzBuzzNumberRule(),
                new BuzzNumberRule(),
                new FizzNumberRule(),
                new StandardNumberRule(),
            )
        );
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    protected function getExpectedAnswers()
    {
        return new ArrayCollection(
            array(
                1 => 1,
                3 => FizzNumberRule::VALID_ANSWER,
                5 => BuzzNumberRule::VALID_ANSWER,
                15 => FizzBuzzNumberRule::VALID_ANSWER,
            )
        );
    }
}
