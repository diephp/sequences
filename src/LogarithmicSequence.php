<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Represents a sequence where each value is computed logarithmically
 * based on a given start value and percentage increment.
 * Implements the \Iterator interface to allow iteration through the sequence.
 */
final class LogarithmicSequence implements \Iterator
{

    /**
     * @var int
     */
    private int $start = 0;

    /**
     * @var int
     */
    private int $percentage = 0;

    /**
     * @var int
     */
    private int $value = 0;

    /**
     * @var int
     */
    private int $times = 0;


    /**
     * Constructor for the LogarithmicSequence class.
     *
     * @param int $start The starting value, must be an integer greater than or equal to 1.
     * @param int $percentage The percentage value, must be an integer between 1 and 100.
     *
     * @return void
     *
     * @throws InvalidArgumentException If $start is less than 1 or if $percentage is not between 1 and 100.
     */
    public function __construct(int $start, int $percentage)
    {
        if ($start < 1) {
            throw new InvalidArgumentException(
                'LogarithmicSequence expects $start argument to be an integer, greater than or equal to 1'
            );
        }

        if ($percentage < 1 || $percentage > 100) {
            throw new InvalidArgumentException(
                'LogarithmicSequence expects $percentage argument to be an integer, between 1 and 100'
            );
        }

        $this->start = $start;
        $this->value = $start;
        $this->percentage = $percentage;
        $this->times = 1;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->value;
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->value = (int)\ceil($this->value * \pow(1 + \log(1 + $this->percentage / 100), 2));
        $this->times++;
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return null;
    }

    #[\ReturnTypeWillChange]
    public function valid()
    {
        return true;
    }

    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->times = 1;
        $this->value = $this->start;
    }

}
