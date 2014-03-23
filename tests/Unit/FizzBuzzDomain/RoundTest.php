<?php

namespace Tests\Unit\FizzBuzzDomain;

use FizzBuzzDomain\Players\ChuckNorris;
use FizzBuzzDomain\Players\Nabila;
use FizzBuzzDomain\Round;
use FizzBuzzDomain\Rules\RulesSets\StandardRulesSet;
use GameDomain\Player\PlayerCollection;

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

        // There should be only two results, the first one correct from Chuck Norris, the second one failed from Nabila
        $this->assertCount(2, $roundResult);

        /**
         * @covers \GameDomain\Round\Step\StepResult::isValid
         */
        $this->assertTrue($roundResult->first()->isValid());
        $this->assertFalse($roundResult->last()->isValid());

        /**
         * @covers \GameDomain\Round\Step\StepResult::__toString
         */
        $this->assertEquals(
            'Player "Chuck Norris" correctly answered "1" at round #1.',
            (string) $roundResult->first()
        );
        $this->assertEquals(
            'Player "Nabila" failed by answering "Hallo ?!" at round #2. Correct answer was "2".',
            (string) $roundResult->last()
        );
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
