<?php

namespace Tests\Unit\GameDomain\Round\Step;

use GameDomain\Player\PlayerInterface;
use GameDomain\Player\Players\PerfectPlayer;
use GameDomain\Player\Players\StupidPlayer;
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
                new PerfectPlayer(),
                new Answer(1),
                new Answer(1),
                new Step(1),
                'Player "Perfect" correctly answered "1" at step #1.',
            ),
            array(
                new StupidPlayer(),
                new Answer('fail'),
                new Answer(2),
                new Step(2),
                'Player "Stupid" failed by answering "fail" at step #2. Correct answer was "2".',
            ),
        );
    }
}
