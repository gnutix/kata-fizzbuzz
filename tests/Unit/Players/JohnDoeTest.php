<?php

namespace Tests\Unit\Players;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\NumberGenerators\FakeNumberGenerator;
use FizzBuzz\Players\ChuckNorris;
use FizzBuzz\Players\JohnDoe;
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
     * @dataProvider getFakeRandomGeneratorNumbers
     */
    public function testJohnDoeRandomAnswers($number, Answer $expectedAnswer)
    {
        $randomPlayer = new JohnDoe(new ChuckNorris(), new FakeNumberGenerator($number));

        $this->assertEquals($expectedAnswer, $randomPlayer->play($this->gameRules, new Step(1)));
    }

    /**
     * @return array
     */
    public function getFakeRandomGeneratorNumbers()
    {
        return array(
            array(0, new Answer('?')),
            array(1, new Answer(1)),
        );
    }
}
