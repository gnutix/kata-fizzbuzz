<?php

namespace Tests\Unit\FizzBuzzDomain\Players;

use FizzBuzzDomain\Players\JohnDoe;
use FizzBuzzDomain\Rules\FizzNumberRule;
use FizzBuzzDomain\Rules\RulesSets\StandardRulesSet;
use GameDomain\Round\Step\Step;
use Utils\NumberGenerator\NumberGeneratorInterface;
use Utils\NumberGenerator\NumberGenerators\FakeNumberGenerator;

/**
 * JohnDoe Test
 */
class JohnDoeTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzzDomain\Rules\RulesSets\StandardRulesSet */
    protected $gameRules;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->gameRules = new StandardRulesSet();
    }

    /**
     * @param \Utils\NumberGenerator\NumberGeneratorInterface $numberGenerator
     * @param int                                             $stepNumber
     * @param mixed                                           $expectedAnswer
     *
     * @dataProvider getFakeRandomGeneratorNumbers
     */
    public function testPlay(NumberGeneratorInterface $numberGenerator, $stepNumber, $expectedAnswer)
    {
        $player = new JohnDoe($numberGenerator);

        $this->assertEquals($expectedAnswer, $player->play($this->gameRules, new Step($stepNumber))->getRawValue());
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
