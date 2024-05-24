<?php

use DiePHP\Sequences\InfiniteSequence;
use PHPUnit\Framework\TestCase;

class _TestInfiniteSequenceTest extends TestCase
{

    /**
     * This test class is for the InfiniteSequence class.
     * It specifically tests the "current" method of the InfiniteSequence class.
     * The current method is intended to return the current value of the sequence.
     * Since this is an infinite sequence, the current value is whatever
     * the sequence was last set to, and is initialized at 0 or a provided integer number.
     */

    /**
     * Test current method returns the initialized start value.
     */
    public function testCurrentReturnsStartValue()
    {
        $sequence = new InfiniteSequence(5);
        $this->assertEquals(5, $sequence->current());
    }

    /**
     * Test current method returns the correct value after next()
     * has been called.
     */
    public function testCurrentReturnsCorrectValueAfterNext()
    {
        $sequence = new InfiniteSequence(10);
        $sequence->next();
        $this->assertEquals(11, $sequence->current());
    }

    /**
     * Test current method returns 0 when started without specific start value.
     */
    public function testCurrentReturnsZeroWithNoStart()
    {
        $sequence = new InfiniteSequence();
        $this->assertEquals(0, $sequence->current());
    }

}
