<?php

use DiePHP\Sequences\ExponentialSequence;
use PHPUnit\Framework\TestCase;

class _TestExponentialSequenceTest extends TestCase
{

    /**
     * Test the construction of the ExponentialSequence class.
     * Expects InvalidArgumentException to be thrown when invalid parameters are passed.
     */
    public function testConstructor()
    {
        $sequence = new ExponentialSequence(2, 50);
        $this->assertInstanceOf(ExponentialSequence::class, $sequence, 'ExponentialSequence instantiation failed.');

        $this->expectException(InvalidArgumentException::class);
        $invalidSequence1 = new ExponentialSequence(0, 50);

        $this->expectException(InvalidArgumentException::class);
        $invalidSequence2 = new ExponentialSequence(2, 101);

        $this->expectException(InvalidArgumentException::class);
        $invalidSequence3 = new ExponentialSequence(2, -1);

    }

    public function testExponentialIteratorBy100()
    {

        $sequence = new ExponentialSequence(1, 100);
        $this->assertEquals(1, $sequence->current());

        $sequence->next();
        $this->assertEquals(2, $sequence->current());

        $sequence->next();
        $this->assertEquals(4, $sequence->current());

        $sequence->next();
        $this->assertEquals(8, $sequence->current());

        $sequence->next();
        $this->assertEquals(16, $sequence->current());

        $sequence->next();
        $this->assertEquals(32, $sequence->current());

        $sequence->next();
        $this->assertEquals(64, $sequence->current());

        $sequence->next();
        $this->assertEquals(128, $sequence->current());

        $sequence->next();
        $this->assertEquals(256, $sequence->current());

        $sequence->next();
        $this->assertEquals(512, $sequence->current());

        $sequence->next();
        $this->assertEquals(1024, $sequence->current());
    }

    public function testExponentialIteratorBy50()
    {

        $sequence = new ExponentialSequence(4, 100);

        $this->assertEquals(4, $sequence->current());
        $sequence->next();
        
        $this->assertEquals(8, $sequence->current());
        $sequence->next();

        $this->assertEquals(64, $sequence->current());
        $sequence->next();
        
        $this->assertEquals(512, $sequence->current());
        $sequence->next();

        $this->assertEquals(4096, $sequence->current());
        $sequence->next();

        $this->assertEquals(32768, $sequence->current());
        $sequence->next();

        $this->assertEquals(262144, $sequence->current());
        $sequence->next();

        $this->assertEquals(2097152, $sequence->current());
        $sequence->next();

    }

}
