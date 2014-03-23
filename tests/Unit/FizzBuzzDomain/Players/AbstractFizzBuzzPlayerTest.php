<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Rules\RulesSets\StandardRulesSet;
use GameDomain\Player\PlayerInterface;
use GameDomain\Round\Step\Step;

/**
 * Player Test
 */
abstract class AbstractFizzBuzzPlayerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testStringRepresentation()
    {
        $this->assertNotEmpty((string) $this->getPlayer());
    }

    /**
     * @return array
     */
    public function getSteps()
    {
        return array(
            array(1),
            array(3),
            array(5),
            array(15),
            array(100),
        );
    }

    /**
     * @param int $stepNumber
     *
     * @dataProvider getSteps
     */
    abstract public function testPlay($stepNumber);

    /**
     * @param \GameDomain\Player\PlayerInterface $player
     * @param int                                $stepNumber
     *
     * @return bool
     */
    protected function play(PlayerInterface $player, $stepNumber)
    {
        return $this->getGameRules()->generateValidAnswer($stepNumber)->isSameAs(
            $player->play($this->getGameRules(), $this->createStep($stepNumber))
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
     * @param int $stepNumber
     *
     * @return \GameDomain\Round\Step\Step
     */
    protected function createStep($stepNumber)
    {
        return new Step($stepNumber);
    }

    /**
     * @return \GameDomain\Player\PlayerInterface
     */
    abstract protected function getPlayer();
}
