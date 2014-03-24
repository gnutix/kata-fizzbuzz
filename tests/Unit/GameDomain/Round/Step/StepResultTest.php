<?php

namespace Tests\Unit\GameDomain\Round\Step;

use FizzBuzzDomain\Players\ChuckNorris;
use FizzBuzzDomain\Players\Nabila;
use GameDomain\Player\PlayerInterface;
use GameDomain\Round\Step\Answer;
use GameDomain\Round\Step\Step;
use GameDomain\Round\Step\StepResult;

/**
 * StepResult Test
 */
class StepResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getStepResults
     */
    public function testIsValid(
        PlayerInterface $player,
        Answer $playerAnswer,
        Answer $validAnswer,
        Step $step,
        $expectedStringRepresentation
    ) {
        $stepResult = new StepResult($player, $playerAnswer, $validAnswer, $step);

        // Tests for methods having logic
        $this->assertEquals($playerAnswer->isSameAs($validAnswer), $stepResult->isValid());
        $this->assertEquals($expectedStringRepresentation, (string) $stepResult);

        // Tests for getters
        $this->assertInstanceOf('\GameDomain\Player\PlayerInterface', $stepResult->getPlayer());
        $this->assertInstanceOf('\GameDomain\Round\Step\Step', $stepResult->getStep());
        $this->assertInstanceOf('\GameDomain\Round\Step\Answer', $stepResult->getPlayerAnswer());
        $this->assertInstanceOf('\GameDomain\Round\Step\Answer', $stepResult->getValidAnswer());
    }

    /**
     * @return array
     */
    public function getStepResults()
    {
        return array(
            array(
                new ChuckNorris(),
                new Answer(1),
                new Answer(1),
                new Step(1),
                'Player "Chuck Norris" correctly answered "1" at round #1.',
            ),
            array(
                new Nabila(),
                new Answer(1),
                new Answer(2),
                new Step(2),
                'Player "Nabila" failed by answering "1" at round #2. Correct answer was "2".',
            ),
        );
    }
}
