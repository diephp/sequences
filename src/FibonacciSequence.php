<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Class FibonacciSequence
 * Represents a Fibonacci sequence iterator.
 */
class FibonacciSequence implements \Iterator
{

    private $current = 0;

    private $next    = 1;

    private $start   = 0;

    public function __construct(int $start = 0)
    {
        if ($start < 0) {
            throw new InvalidArgumentException(
                'LinearSequence expects $start argument to be an integer, greater than or equal to 0'
            );
        }

        $this->current = $this->start = $start;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->current;
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        $newNext = $this->current + $this->next;
        $this->current = $this->next;
        $this->next = $newNext;
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->current;
    }

    #[\ReturnTypeWillChange]
    public function valid()
    {
        return true;
    }

    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->current = $this->start;
        $this->next = 1;
    }

}
