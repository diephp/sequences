<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Class LinearSequence
 * Represents a linear sequence that implements the Iterator interface.
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
     * @param int $start
     * @param int $amount
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
