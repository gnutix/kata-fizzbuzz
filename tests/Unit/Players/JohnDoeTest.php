<?php

namespace Tests\Unit\Players;

use FizzBuzz\Entity\Answer;
use FizzBuzz\Entity\Step;
use FizzBuzz\NumberGeneratorInterface;
use FizzBuzz\NumberGenerators\FakeNumberGenerator;
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
     * @param \FizzBuzz\NumberGeneratorInterface $numberGenerator
     * @param int                                $stepNumber
     * @param mixed                              $expectedAnswer
     *
     * @dataProvider getFakeRandomGeneratorNumbers
     */
    public function testJohnDoeRandomAnswers(NumberGeneratorInterface $numberGenerator, $stepNumber, $expectedAnswer)
    {
        $player = new JohnDoe($numberGenerator);

        $this->assertEquals(new Answer($expectedAnswer), $player->play($this->gameRules, new Step($stepNumber)));
    }

    /**
     * @return array
     */
    public function getFakeRandomGeneratorNumbers()
    {
        return array(
            array(new FakeNumberGenerator(0), 1, '?'),
            array(new FakeNumberGenerator(1), 1, 1),
            array(new FakeNumberGenerator(0), 3, '?'),
            array(new FakeNumberGenerator(1), 3, FizzNumberRule::VALID_ANSWER),
        );
    }
}
