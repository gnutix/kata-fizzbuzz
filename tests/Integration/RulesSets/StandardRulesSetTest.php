<?php

namespace Tests\Integration\RulesSets;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Rules\BuzzNumberRule;
use FizzBuzz\Rules\FizzBuzzNumberRule;
use FizzBuzz\Rules\FizzNumberRule;
use FizzBuzz\RulesSets\StandardRulesSet;

/**
 * StandardRulesSet Test
 */
class StandardRulesSetTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzz\RulesSets\StandardRulesSet */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new StandardRulesSet();
    }

    /**
     * @covers \FizzBuzz\AbstractRulesSet::loadRules
     */
    public function testStandardRulesAreMatched()
    {
        $this->assertEquals(new Answer(1), $this->sut->generateValidAnswer(1));
        $this->assertEquals(new Answer(FizzNumberRule::VALID_ANSWER), $this->sut->generateValidAnswer(3));
        $this->assertEquals(new Answer(BuzzNumberRule::VALID_ANSWER), $this->sut->generateValidAnswer(5));
        $this->assertEquals(new Answer(FizzBuzzNumberRule::VALID_ANSWER), $this->sut->generateValidAnswer(15));
    }
}
