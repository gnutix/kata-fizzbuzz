<?php

namespace Tests\Unit\Players;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\NumberGenerators\FakeNumberGenerator;
use FizzBuzz\Players\ChuckNorris;
use FizzBuzz\Players\JohnDoe;
use FizzBuzz\Rules\FizzNumberRule;
use FizzBuzz\RulesSets\StandardRulesSet;

/**
 * JohnDoe Test
 */
class JohnDoeTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzz\RulesSets\StandardRulesSet */
    protected $gameRules;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->gameRules = new StandardRulesSet();
    }

    /**
     * @param int   $fakeNumber
     * @param int   $stepNumber
     * @param mixed $expectedAnswer
     *
     * @dataProvider getFakeRandomGeneratorNumbers
     */
    public function testJohnDoeRandomAnswers($fakeNumber, $stepNumber, $expectedAnswer)
    {
        $player = new JohnDoe(new ChuckNorris(), new FakeNumberGenerator($fakeNumber));

        $this->assertEquals(new Answer($expectedAnswer), $player->play($this->gameRules, new Step($stepNumber)));
    }

    /**
     * @return array
     */
    public function getFakeRandomGeneratorNumbers()
    {
        return array(
            array(0, 1, '?'),
            array(1, 1, 1),
            array(0, 3, '?'),
            array(1, 3, FizzNumberRule::VALID_ANSWER),
        );
    }
}
