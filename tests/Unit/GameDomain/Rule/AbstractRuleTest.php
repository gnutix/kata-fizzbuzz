<?php

namespace Tests\Unit\GameDomain\Rule;

use GameDomain\Round\Step\Answer;
use Tests\Unit\GameDomain\Rule\Mocks\TestRule;

/**
 * AbstractRule Test
 */
class AbstractRuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Tests\Unit\GameDomain\Rule\Mocks\TestRule */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new TestRule();
    }

    /**
     * @dataProvider getSatisfiedByData
     *
     * @param \GameDomain\Round\Step\Answer $answer
     * @param int                           $number
     * @param bool                          $expectedResult
     */
    public function testIsSatisfiedBy(Answer $answer, $number, $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->sut->isSatisfiedBy($answer, $number));
    }

    /**
     * @return array
     */
    public function getSatisfiedByData()
    {
        return array(
            array(new Answer(-1), -1, false),
            array(new Answer(0), 0, false),
            array(new Answer(1), 1, true),
            array(new Answer(PHP_INT_MAX), PHP_INT_MAX, true),
        );
    }
}
