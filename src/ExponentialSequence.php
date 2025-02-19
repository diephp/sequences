<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Represents an exponential sequence generator that implements the Iterator interface.
 * The sequence is derived based on a starting value and a percentage increment, applied exponentially.
 */
final class ExponentialSequence implements \Iterator
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
     * Constructor for the ExponentialSequence class.
     *
     * @param int $start The starting value, must be an integer greater than or equal to 1.
     * @param int $percentage The percentage value, must be an integer between 1 and 100.
     * @return void
     * @throws InvalidArgumentException If $start is less than 1 or $percentage is not between 1 and 100.
     */
    public function __construct(int $start, int $percentage)
    {
        if ($start < 1) {
            throw new InvalidArgumentException(
                'ExponentialSequence expects $start argument to be an integer, greater than or equal to 1'
            );
        }

        if ($percentage < 1 || $percentage > 100) {
            throw new InvalidArgumentException(
                'ExponentialSequence expects $percentage argument to be an integer, between 1 and 100'
            );
        }

        $this->start = $start;
        $this->times = 1;
        $this->percentage = $percentage;
        $this->value = $start;
    }

    #[\ReturnTypeWillChange]
    public function current(): int
    {
        return $this->value;
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->value = (int)\round(\pow($this->start * (1 + $this->percentage / 100), $this->times));
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
