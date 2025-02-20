<?php

use DiePHP\Sequences\LogarithmicSequence;
use PHPUnit\Framework\TestCase;

class _TestLogarithmicSequenceTest extends TestCase
{

    /**
     * @var LogarithmicSequence
     */
    private LogarithmicSequence $LogarithmicSequence;

    /**
     * Test setup
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test LogarithmicSequence constructor.
     */
    public function testConstruct()
    {
        // Testing valid input
        $start = 5;
        $percentage = 50;
        $this->LogarithmicSequence = new LogarithmicSequence($start, $percentage);
        $this->assertSame($start, $this->LogarithmicSequence->current(),
            'The start value is not the same as the one set in the constructor');

        // Testing invalid start value
        $this->expectException(\InvalidArgumentException::class);
        $this->LogarithmicSequence = new LogarithmicSequence(-1, $percentage);

        // Testing invalid percentage value, less than 1
        $this->expectException(\InvalidArgumentException::class);
        $this->LogarithmicSequence = new LogarithmicSequence($start, 0);

        // Testing invalid percentage value, greater than 100
        $this->expectException(\InvalidArgumentException::class);
        $this->LogarithmicSequence = new LogarithmicSequence($start, 101);
    }

    public function testLogarithmicSequence1()
    {
        $logarithmicSequence = new LogarithmicSequence(10, 50);

        $this->assertEquals(10, $logarithmicSequence->current());
        $logarithmicSequence->next();

        $this->assertEquals(20, $logarithmicSequence->current());
        $logarithmicSequence->next();

        $this->assertEquals(40, $logarithmicSequence->current());
        $logarithmicSequence->next();

        $this->assertEquals(80, $logarithmicSequence->current());
        $logarithmicSequence->next();

        $this->assertEquals(159, $logarithmicSequence->current());
        $logarithmicSequence->next();

        $this->assertEquals(315, $logarithmicSequence->current());
        $logarithmicSequence->next();

        $this->assertEquals(623, $logarithmicSequence->current());
        $logarithmicSequence->next();

        $this->assertEquals(1231, $logarithmicSequence->current());
        $logarithmicSequence->next();

    }

    public function testLogarithmicSequence2()
    {
        $LogarithmicSequence = new LogarithmicSequence(1, 10);

        $this->assertEquals(1, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

        $this->assertEquals(2, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

        $this->assertEquals(3, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

        $this->assertEquals(4, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

        $this->assertEquals(5, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

        $this->assertEquals(6, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

        $this->assertEquals(8, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

        $this->assertEquals(10, $LogarithmicSequence->current());
        $LogarithmicSequence->next();

    }

}
