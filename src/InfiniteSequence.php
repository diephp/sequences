<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;
use Iterator;

/**
 * InfiniteSequence is an implementation of the Iterator interface, representing an infinite sequence of integers.
 *
 * The sequence starts at a given value and continually increments by 1.
 * It provides key methods to traverse the sequence, although it does not have an endpoint.
 *
 * The class validates the starting value to ensure it is an integer greater than or equal to 0.
 */
final class InfiniteSequence implements Iterator
{

    private $current = 0;
    private $start = 0;

    /**
     * Initializes a new instance of the LinearSequence class.
     *
     * @param int $start The starting value for the sequence. Must be greater than or equal to 0.
     * @return void
     * @throws InvalidArgumentException If the $start value is less than 0.
     */
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
        $this->current++;
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
    }

}
