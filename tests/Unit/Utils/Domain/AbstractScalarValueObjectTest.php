<?php

namespace Tests\Unit\Utils\Domain;

use Tests\Unit\Utils\Domain\Mocks\ScalarValueObjectMock;

/**
 * AbstractScalarValueObject Test
 */
class AbstractScalarValueObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param bool  $expectedResult
     * @param mixed $value
     * @param mixed $otherValue
     *
     * @dataProvider getValues
     */
    public function testIsNotSameAs($expectedResult, $value, $otherValue)
    {
        $valueObject = new ScalarValueObjectMock($value);

        $this->assertEquals($expectedResult, $valueObject->isSameAs($otherValue));
        $this->assertEquals((string) $value, (string) $valueObject);
        $this->assertTrue($value === $valueObject->getRawValue());
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return array(
            array(true, 'identical', new ScalarValueObjectMock('identical')),
            array(true, -1, new ScalarValueObjectMock(-1)),

            array(false, 'identical', $this->getAbstractScalarValueObjectMock()),
            array(false, 'a', new ScalarValueObjectMock('b')),
            array(false, 0, new ScalarValueObjectMock('')),
            array(false, 'test', 'test'),
        );
    }

    /**
     * @param mixed $value
     *
     * @dataProvider getInvalidValues
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidValues($value)
    {
        new ScalarValueObjectMock($value);
    }

    /**
     * @return array
     */
    public function getInvalidValues()
    {
        return array(
            array(new \stdClass()),
            array($this->getStdClassWithProperty()),
            array(array()),
            array(array(1234)),
            array(new ScalarValueObjectMock(1234)),
            array(fopen(dirname(__FILE__), 'r')),
        );
    }

    /**
     * @return \stdClass
     */
    protected function getStdClassWithProperty()
    {
        $stdClassWithProperty = new \stdClass();
        $stdClassWithProperty->test = true;

        return $stdClassWithProperty;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getAbstractScalarValueObjectMock()
    {
        $mock = $this->getMockForAbstractClass(
            '\Utils\Domain\AbstractScalarValueObject',
            array(),
            '',
            false,
            false,
            true,
            array(
                'getRawValue'
            )
        );
        $mock->expects($this->any())
            ->method('getRawValue')
            ->will($this->returnValue('identical'));

        return $mock;
    }
}
