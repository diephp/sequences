<?php

namespace DiePHP\Sequences;

use InvalidArgumentException;

/**
 * A class that provides non-repeating pseudo-random numbers within a specified range, implementing the Iterator interface.
 */
final class UniqRandSequence implements \Iterator
{
    private int $start;         // Lower bound of the range
    private int $count;         // Total size of the range
    private int $index;         // Current index in the pseudo-random sequence
    private array $shuffleOrder; // Precomputed shuffle order for non-repeating numbers
    private ?int $currentValue; // Cached value of the current position

    /**
     * Constructor to initialize the range for the sequence.
     *
     * @param int $minValue The minimum value of the range (inclusive).
     * @param int $maxValue The maximum value of the range (inclusive).
     *
     * @throws InvalidArgumentException If the range is invalid.
     */
    public function __construct(int $minValue, int $maxValue)
    {
        if ($minValue >= $maxValue) {
            throw new InvalidArgumentException('minValue must be less than maxValue.');
        }

        $this->start = $minValue;
        $this->count = $maxValue - $minValue + 1;

        // Generate a shuffle order based on the range
        $this->shuffleOrder = $this->generateShuffleOrder($this->count);
        $this->rewind();
    }

    /**
     * Creates a shuffled order to avoid any repetitions.
     *
     * @param int $size The total number of elements in the range.
     * @return array An array representing the shuffled indices.
     */
    private function generateShuffleOrder(int $size): array
    {
        // Generate a sequential array for the range [0, size-1]
        $order = range(0, $size - 1);

        // Use Fisher-Yates algorithm to shuffle
        for ($i = $size - 1; $i > 0; $i--) {
            $j = mt_rand(0, $i); // Pick a random index between 0 and i
            [$order[$i], $order[$j]] = [$order[$j], $order[$i]]; // Swap elements
        }

        return $order;
    }

    /**
     * Returns the current value of the sequence.
     *
     * @return int The current non-repeating random number.
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        if ($this->currentValue === null) {
            $this->currentValue = $this->start + $this->shuffleOrder[$this->index];
        }
        return $this->currentValue;
    }

    /**
     * Moves to the next random value in the sequence.
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->index++;
        $this->currentValue = null;
    }

    /**
     * Returns the current index in the pseudo-random sequence.
     *
     * @return int The current index.
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->index;
    }

    /**
     * Checks if there are more elements in the sequence.
     *
     * @return bool True if there are more numbers to iterate over, false otherwise.
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
        return $this->index < $this->count;
    }

    /**
     * Resets the sequence to the beginning.
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->index = 0;
        $this->currentValue = null;
    }
}