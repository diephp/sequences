<?php

use DiePHP\Sequences\LinearSequence;
use PHPUnit\Framework\TestCase;

/**
 * Class LinearSequenceTest represent the PHPUnit test for the LinearSequence class.
 */
class _TestLinearSequenceTest extends TestCase
{

    /**
     * Test the __construct function of the LinearSequence class
     * The function should set valid the `start` and `amount` properties when provided with valid input.
     * In case of invalid input, function should thrown an InvalidArgumentException
     */

    public function testLinearSequenceConstructor(): void
    {
        //Test with valid parameters
        $start = 0;
        $amount = 5;

        $linearSequence = new LinearSequence($start, $amount);
        $this->assertEquals($start, $linearSequence->current());

        //Test with invalid parameters
        $this->expectException(InvalidArgumentException::class);

        $start = -5;
        $amount = 1;

        $newLinearSequence = new LinearSequence($start, $amount);
    }

    public function testLinearSequence1()
    {
        $newLinearSequence = new LinearSequence(0, 10);

        $this->assertEquals(0, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(10, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(20, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(30, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(40, $newLinearSequence->current());
        $newLinearSequence->next();

    }

    public function testLinearSequence2()
    {
        $newLinearSequence = new LinearSequence(1, 10);

        $this->assertEquals(1, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(11, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(21, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(31, $newLinearSequence->current());
        $newLinearSequence->next();

        $this->assertEquals(41, $newLinearSequence->current());
        $newLinearSequence->next();

    }

}
