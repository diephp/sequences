<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Class RandSequence
 * Represents a random sequence generator that implements the Iterator interface.
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
     * @param int $start
     * @param int $end
     */
    public function __construct(int $start, int $end)
    {
        if ($start < 0 || $end < 1) {
            throw new InvalidArgumentException(
                'LinearSequence expects $start argument to be an integer, greater than or equal to 0 up 1'
            );
        }

        if ($start >= $end) {
            throw new InvalidArgumentException(
                'LinearSequence expects $end mast be greater than $start'
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
