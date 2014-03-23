<?php

namespace Tests\Unit\FizzBuzzDomain;

use FizzBuzzDomain\Players\ChuckNorris;
use FizzBuzzDomain\Players\Nabila;
use FizzBuzzDomain\Round;
use FizzBuzzDomain\Rules\RulesSets\StandardRulesSet;
use GameDomain\Player\PlayerCollection;
use GameDomain\Round\Step\StepResult;

/**
 * Round Test
 */
class RoundTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Round */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new Round($this->getPlayersIterator());
    }

    /**
     * @test
     */
    public function testPlay()
    {
        $roundResult = $this->sut->play($this->getGameRules());
        $this->assertInstanceOf('\GameDomain\Round\Step\StepResultCollection', $roundResult);
        $this->assertInstanceOf('\GameDomain\Round\Step\StepResult', $roundResult->first());

        // There should be only two results...
        $this->assertCount(2, $roundResult);

        // ... the first one correct from Chuck Norris, the second one failed from Nabila
        $this->assertValidStepResult($roundResult->first());
        $this->assertInvalidStepResult($roundResult->last());
    }

    /**
     * @param \GameDomain\Round\Step\StepResult $stepResult
     */
    protected function assertValidStepResult(StepResult $stepResult)
    {
        $this->assertTrue($stepResult->isValid());
        $this->assertContains('correctly answered', (string) $stepResult, '', true);
    }

    /**
     * @param \GameDomain\Round\Step\StepResult $stepResult
     */
    protected function assertInvalidStepResult(StepResult $stepResult)
    {
        $this->assertFalse($stepResult->isValid());
        $this->assertContains('failed', (string) $stepResult, '', true);
        $this->assertContains('correct answer was', (string) $stepResult, '', true);
    }

    /**
     * @return \GameDomain\Rule\AbstractRulesSet
     */
    protected function getGameRules()
    {
        return new StandardRulesSet();
    }

    /**
     * @return \LimitIterator
     */
    protected function getPlayersIterator()
    {
        return new \LimitIterator(new \ArrayIterator($this->getPlayers()->toArray()), 0, PHP_INT_MAX);
    }

    /**
     * @return \GameDomain\Player\PlayerCollection
     */
    protected function getPlayers()
    {
        return new PlayerCollection(
            array(
                new ChuckNorris(),
                new Nabila(),
                new ChuckNorris(),
                new ChuckNorris(),
            )
        );
    }
}
