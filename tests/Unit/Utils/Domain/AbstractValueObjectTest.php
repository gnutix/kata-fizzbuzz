<?php

namespace Tests\Unit\Utils\Domain;

use Tests\Unit\Utils\Domain\Mocks\ValueObjectMock;

/**
 * AbstractValueObject Test
 */
class AbstractValueObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param bool  $expectedResult
     * @param mixed $value
     * @param mixed $otherValue
     *
     * @dataProvider getValueObjects
     */
    public function testIsNotSameAs($expectedResult, $value, $otherValue)
    {
        $valueObject = new ValueObjectMock($value);

        $valueAsString = is_object($value) || is_array($value) ? json_encode($value) : (string) $value;

        $this->assertEquals($expectedResult, $valueObject->isSameAs($otherValue));
        $this->assertEquals($valueAsString, (string) $valueObject);
        $this->assertTrue($value === $valueObject->getRawValue());
    }

    /**
     * @return array
     */
    public function getValueObjects()
    {
        $stdClassWithProperty = new \stdClass();
        $stdClassWithProperty->test = true;

        return array(
            array(true, 'identical', new ValueObjectMock('identical')),
            array(true, new ValueObjectMock('a'), new ValueObjectMock(new ValueObjectMock('a'))),
            array(true, -1, new ValueObjectMock(-1)),
            array(true, array(1), new ValueObjectMock(array(1))),
            array(true, new \stdClass(), new ValueObjectMock(new \stdClass())),
            array(true, clone $stdClassWithProperty, new ValueObjectMock($stdClassWithProperty)),

            array(false, 'identical', $this->getAbstractValueObjectMock()),
            array(false, 'a', new ValueObjectMock('b')),
            array(false, 0, new ValueObjectMock('')),
            array(false, array(), new ValueObjectMock(array(1))),
            array(false, new \stdClass(), new ValueObjectMock(new ValueObjectMock('test'))),
            array(false, new \stdClass(), new ValueObjectMock($stdClassWithProperty)),
            array(false, 'test', 'test'),
        );
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getAbstractValueObjectMock()
    {
        $abstractValueObjectMock = $this->getMockForAbstractClass(
            '\Utils\Domain\AbstractValueObject',
            array(),
            '',
            false,
            false,
            true,
            array(
                'getRawValue'
            )
        );
        $abstractValueObjectMock->expects($this->any())
            ->method('getRawValue')
            ->will($this->returnValue('identical'));

        return $abstractValueObjectMock;
    }
}
