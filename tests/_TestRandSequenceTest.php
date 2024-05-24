<?php

use DiePHP\Sequences\RandSequence;
use PHPUnit\Framework\TestCase;

class _TestRandSequenceTest extends TestCase
{

    /**
     * @test
     */
    public function testRandSequenceConstructionWithValidArguments() : void
    {
        $sequence = new RandSequence(0, 10);
        $this->assertInstanceOf(RandSequence::class, $sequence);
    }

    /**
     * @test
     */
    public function testRandSequenceConstructionWithInvalidStart() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $sequence = new RandSequence(-1, 10);
    }

    /**
     * @test
     */
    public function testRandSequenceConstructionWithInvalidEnd() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $sequence = new RandSequence(0, 0);

    }

    public function testRandSequence() : void
    {
        $sequence = new RandSequence(50, 60);

        $iteration = 0;
        foreach ($sequence as $value) {

            $this->assertGreaterThanOrEqual(50, $value);
            $this->assertLessThanOrEqual(60, $value);

            $iteration++;
            if ($iteration >= 100) break;
        }

    }

}
