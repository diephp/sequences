<?php

use DiePHP\Sequences\ProgressiveSequence;
use PHPUnit\Framework\TestCase;

class _TestProgressiveSequenceTest extends TestCase
{

    /**
     * @var ProgressiveSequence
     */
    private ProgressiveSequence $progressiveSequence;

    /**
     * Test setup
     */
    protected function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Test ProgressiveSequence constructor.
     */
    public function testConstruct()
    {
        // Testing valid input
        $start = 5;
        $percentage = 50;
        $this->progressiveSequence = new ProgressiveSequence($start, $percentage);
        $this->assertSame($start, $this->progressiveSequence->current(),
            'The start value is not the same as the one set in the constructor');

        // Testing invalid start value
        $this->expectException(\InvalidArgumentException::class);
        $this->progressiveSequence = new ProgressiveSequence(-1, $percentage);

        // Testing invalid percentage value, less than 1
        $this->expectException(\InvalidArgumentException::class);
        $this->progressiveSequence = new ProgressiveSequence($start, 0);

        // Testing invalid percentage value, greater than 100
        $this->expectException(\InvalidArgumentException::class);
        $this->progressiveSequence = new ProgressiveSequence($start, 101);
    }

    public function testProgressiveSequence1()
    {
        $progressiveSequence = new ProgressiveSequence(100, 50);

        $this->assertEquals(100, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(150, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(250, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(400, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(600, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(850, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(1150, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(1500, $progressiveSequence->current());
        $progressiveSequence->next();

    }

    public function testProgressiveSequence2()
    {
        $progressiveSequence = new ProgressiveSequence(1, 10);

        $this->assertEquals(1, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(1, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(1, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(1, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(1, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(2, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(3, $progressiveSequence->current());
        $progressiveSequence->next();

        $this->assertEquals(4, $progressiveSequence->current());
        $progressiveSequence->next();

    }

}
