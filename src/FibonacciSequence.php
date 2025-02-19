<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * This class generates a Fibonacci sequence, implementing the Iterator interface.
 *
 * The Fibonacci sequence starts with two initial numbers (usually 0 and 1), with each subsequent number being the sum
 * of the two preceding ones. This implementation allows traversing the sequence using an iterator interface.
 *
 * The starting value can be customized through the constructor. If no start value is provided, the sequence begins at 0.
 *
 * Methods in this class implement the required Iterator interface functionality.
 */
final class FibonacciSequence implements \Iterator
{

    private $current = 0;

    private $next = 1;

    private $start = 0;

    /**
     * Constructs a new instance of the class.
     *
     * @param int $start The starting value for the sequence. Must be greater than or equal to 0.
     * @return void
     * @throws InvalidArgumentException If $start is less than 0.
     */
    public function __construct(int $start = 0)
    {
        if ($start < 0) {
            throw new InvalidArgumentException(
                'FibonacciSequence expects $start argument to be an integer, greater than or equal to 0'
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
