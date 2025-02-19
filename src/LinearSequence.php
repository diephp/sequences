<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Represents a linear sequence of numbers that implements the Iterator interface.
 * The sequence begins at a specified starting point and increments by a set amount on each iteration.
 *
 * This class is designed to provide a simple interface for iterating through a sequence
 * of integers in a linear progression.
 *
 * The `start` property determines the starting value of the sequence, while the `amount`
 * property defines the increment applied to the value on each iteration.
 */
final class LinearSequence implements \Iterator
{

    /**
     * @var int
     */
    private int $start = 0;

    /**
     * @var int
     */
    private int $amount = 1;

    /**
     * @var int
     */
    private int $value = 0;

    /**
     * Constructs a new instance of the LinearSequence class.
     *
     * @param int $start The starting value of the sequence. Must be greater than or equal to 0.
     * @param int $amount The amount that determines the progression in the sequence.
     * @return void
     *
     * @throws InvalidArgumentException If the $start parameter is less than 0.
     */
    public function __construct(int $start, int $amount)
    {
        if ($start < 0) {
            throw new InvalidArgumentException(
                'LinearSequence expects $start argument to be an integer, greater than or equal to 0'
            );
        }

        $this->start = $start;
        $this->amount = $amount;
        $this->value = $this->start;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->value;
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->value += $this->amount;
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
