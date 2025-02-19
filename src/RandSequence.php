<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * Provides an iterable sequence of pseudo-random numbers within a specified range, using
 * a linear congruential generator formula.
 *
 * This class implements the Iterator interface to allow iteration over a finite sequence
 * of numbers. The sequence is determined by the specified range [start, end], where `start`
 * is inclusive and `end` is inclusive. A pseudo-random formula is applied to compute the
 * sequence order deterministically based on the configured constants.
 *
 * The class supports standard iterator methods, including retrieving the current value,
 * moving to the next item, and rewinding to the beginning of the sequence.
 *
 * Properties:
 * - $start: Represents the lower bound of the range.
 * - $currentIndex: Tracks the current index in the sequence.
 * - $count: Total numbers in the range, determined by the difference between start and end.
 * - $currentValue: Caches the computed value for the current position.
 * - $a, $c: Constants used in the linear congruential generation formula.
 *
 * Methods:
 * - __construct(int $start, int $end): Initializes the range for the sequence. Throws an exception
 *   if the start is not less than the end.
 * - current(): Returns the current value in the sequence, recalculated if not already set.
 * - next(): Advances the sequence to the next index using a pseudo-random formula.
 * - key(): Retrieves the current index.
 * - valid(): Checks whether the iterator is still within the valid range.
 * - rewind(): Resets the sequence to the initial state.
 */
final class RandSequence implements \Iterator
{
    private int $start;      // Lower bound of the range
    private int $index; // Current index in the sequence
    private int $count;      // Total numbers in the range
    private ?int $currentValue;
    private int $a = 1664525; // Constant for linear congruential generation
    private int $c = 1013904223; // Constant for linear congruential generation

    /**
     * Initializes an instance with the specified start and end values.
     *
     * @param int $minValue The starting value of the range.
     * @param int $maxValue The ending value of the range; must be greater than the start value.
     * @return void
     * @throws InvalidArgumentException If the start value is not less than the end value.
     */
    public function __construct(int $minValue, int $maxValue)
    {
        if ($minValue >= $maxValue) {
            throw new InvalidArgumentException('minValue must be less than maxValue.');
        }

        if ($minValue < 0) {
            throw new InvalidArgumentException('minValue must be greater than 0.');
        }

        $this->start = $minValue;
        $this->count = $maxValue - $minValue; // Calculate the total range length
        $this->index = $this->start % $this->count;
        $this->currentValue = null;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        // Return the current value based on the index
        if ($this->currentValue === null) {
            $this->currentValue = $this->start + ($this->index % $this->count);
        }
        return $this->currentValue;
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        // Move to the next index using a pseudo-random formula
        if ($this->index < $this->count) {
            $this->index = ($this->a * $this->index + $this->c) % $this->count;
            $this->currentValue = null; // Invalidate current value
        }
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        // The key is simply the current index
        return $this->index;
    }

    #[\ReturnTypeWillChange]
    public function valid()
    {
        // Sequence is valid while the current index is within range
        return $this->index < $this->count;
    }

    #[\ReturnTypeWillChange]
    public function rewind()
    {
        // Reset the sequence to the start
        $this->index = $this->start % $this->count;
        $this->currentValue = null;
    }
}