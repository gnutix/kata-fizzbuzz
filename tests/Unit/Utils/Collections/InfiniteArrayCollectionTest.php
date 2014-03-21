<?php

namespace Tests\Utils\Collections;

use Utils\Collections\InfiniteArrayCollection;

/**
 * InfiniteArrayCollection Test
 */
class InfiniteArrayCollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Utils\Collections\InfiniteArrayCollection */
    protected $sut;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->sut = new InfiniteArrayCollection(array(1, 2, 3));
    }

    /**
     * @todo Complete test.
     */
    public function testInfiniteIterator()
    {
        $this->assertInstanceOf('\InfiniteIterator', $this->sut->getInfiniteIterator());

        $this->markTestIncomplete('Complete assertions about ->rewind() piece of code.');
    }
}
