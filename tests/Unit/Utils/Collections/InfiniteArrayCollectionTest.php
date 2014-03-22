<?php

namespace Tests\Utils\Collections;

use Utils\Collections\InfiniteArrayCollection;

/**
 * InfiniteArrayCollection Test
 */
class InfiniteArrayCollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @var array */
    protected $data = array(1, 2, 3);

    /** @var \Utils\Collections\InfiniteArrayCollection */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new InfiniteArrayCollection($this->data);
    }

    /**
     * @test
     */
    public function testInfiniteIteratorResult()
    {
        $infiniteIterator = $this->sut->getInfiniteIterator();
        $this->assertInstanceOf('\InfiniteIterator', $infiniteIterator);

        $expectedValues = array_merge($this->data, $this->data, $this->data);

        foreach ($infiniteIterator as $value) {
            if (empty($expectedValues)) {
                break;
            }

            $this->assertEquals(array_shift($expectedValues), $value);
        }
    }
}
