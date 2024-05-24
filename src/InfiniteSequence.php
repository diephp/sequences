<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;
use Iterator;

final class InfiniteSequence implements Iterator
{

    private $current = 0;

    public function __construct(int $start = 0)
    {
        if ($start < 0) {
            throw new InvalidArgumentException(
                'LinearSequence expects $start argument to be an integer, greater than or equal to 0'
            );
        }

        $this->current = $start;
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
        $this->current = 0;
    }

}
