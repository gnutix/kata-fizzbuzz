<?php

namespace Tests\Unit;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * AbstractRulesSet Tests
 */
class AbstractRulesSetTest extends \PHPUnit_Framework_TestCase
{
    /** @var \FizzBuzz\AbstractRulesSet|\PHPUnit_Framework_MockObject_MockObject */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass(
            '\FizzBuzz\AbstractRulesSet',
            array(),
            '',
            false,
            false,
            true,
            array(
                'toArray'
            )
        );
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage No valid answer can be generated from the current rules set.
     */
    public function testDomainExceptionIsThrownOnEmptyGameRules()
    {
        $this->sut->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue(new ArrayCollection()));

        $this->sut->generateValidAnswer(1);
    }
}
