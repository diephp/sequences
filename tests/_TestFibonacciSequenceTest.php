<?php

use DiePHP\Sequences\FibonacciSequence;
use PHPUnit\Framework\TestCase;

class _TestFibonacciSequenceTest extends TestCase
{

    /**
     * @var FibonacciSequence
     */
    protected $fibonacciSeq;

    protected function setUp(): void
    {
        // Start Fibonacci sequence at 0
        $this->fibonacciSeq = new FibonacciSequence(0);
    }

    // Test 'current' method
    public function testCurrentReturnsInitialValueWhenSequenceStarts()
    {
        $this->assertEquals(0, $this->fibonacciSeq->current());
    }

    public function testCurrentMethodAfterInvokingNext()
    {
        $this->fibonacciSeq->next();
        $this->assertEquals(1, $this->fibonacciSeq->current());
    }

    public function testCurrentMethodAfterInvokingNextMultipleTimes()
    {
        $this->fibonacciSeq->next();
        $this->assertEquals(1, $this->fibonacciSeq->current());

        $this->fibonacciSeq->next();
        $this->assertEquals(1, $this->fibonacciSeq->current());

        $this->fibonacciSeq->next();
        $this->assertEquals(2, $this->fibonacciSeq->current());

        $this->fibonacciSeq->next();
        $this->assertEquals(3, $this->fibonacciSeq->current());

        $this->fibonacciSeq->next();
        $this->assertEquals(5, $this->fibonacciSeq->current());

        $this->fibonacciSeq->next();
        $this->assertEquals(8, $this->fibonacciSeq->current());
    }

}
