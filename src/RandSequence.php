<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * A class that generates a pseudo-random sequence of integers within a specified range.
 * Implements the Iterator interface to allow iteration over random values.
 */
final class RandSequence implements \Iterator
{

    /**
     * @var int
     */
    private int $start;

    /**
     * @var int
     */
    private int $end;

    /**
     * @var int
     */
    private int $value;

    /**
     * Constructs a new instance of the class with the specified start and end values.
     *
     * @param int $start The starting value of the sequence. Must be an integer greater than or equal to 0.
     * @param int $end The ending value of the sequence. Must be an integer greater than 0 and greater than $start.
     *
     * @return void
     *
     * @throws InvalidArgumentException If $start is less than 0, $end is less than 1, or $start is greater than or equal to $end.
     */
    public function __construct(int $start, int $end)
    {
        if ($start < 0 || $end < 1) {
            throw new InvalidArgumentException(
                'RandSequence expects $start argument to be an integer, greater than or equal to 0 up 1'
            );
        }

        if ($start >= $end) {
            throw new InvalidArgumentException(
                'RandSequence expects $end mast be greater than $start'
            );
        }

        $this->start = $start;
        $this->value = $start;
        $this->end = $end;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->value;
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->value = mt_rand($this->start, $this->end);
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return 0;
    }

    #[\ReturnTypeWillChange]
    public function valid()
    {
        return true;
    }

    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->value = $this->start;
    }

}
