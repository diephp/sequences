<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Class ProgressiveSequence
 * Represents a progressive sequence that can be iterated over.
 * Implements the Iterator interface.
 */
class ProgressiveSequence implements \Iterator
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
     * @param int $start
     * @param int $percentage
     */
    public function __construct(int $start, int $percentage)
    {
        if ($start < 1) {
            throw new InvalidArgumentException(
                'ProgressiveSequence expects $start argument to be an integer, greater than or equal to 1'
            );
        }

        if ($percentage < 1 || $percentage > 100) {
            throw new InvalidArgumentException(
                'ProgressiveSequence expects $percentage argument to be an integer, between 1 and 100'
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
        $this->value = (int) \round($this->value + ($this->start * ($this->percentage / 100)) * $this->times);
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
