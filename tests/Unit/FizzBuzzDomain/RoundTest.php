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
    /**
     * @test
     */
    public function testPlay()
    {
        $round = new Round($this->getPlayersIterator());
        $roundResult = $round->play($this->getGameRules());

        $this->assertInstanceOf('\GameDomain\Round\Step\StepResultCollection', $roundResult);
        $this->assertInstanceOf('\GameDomain\Round\Step\StepResult', $roundResult->first());

        // There should be only two results : the first one correct from Chuck Norris, the second one failed from Nabila
        $this->assertCount(2, $roundResult);
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
                new ChuckNorris(), // this player will never play, as Nabila will fail before
            )
        );
    }
}
