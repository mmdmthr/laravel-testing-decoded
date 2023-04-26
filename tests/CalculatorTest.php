<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    protected $calc;

    protected function setUp(): void
    {
        $this->calc = new Calculator;
    }

    public function testInstance()
    {
        $this->assertSame(0, $this->calc->getResult());
    }

    public function testAddsNumbers()
    {
        $this->calc->add(5);
        $this->assertEquals(5, $this->calc->getResult());
    }

    public function testRequiresNumericValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->add('five');
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->add(1, 2, 3, 4);

        $this->assertEquals(10, $this->calc->getResult());
        $this->assertNotEquals('Snoop Dogg', $this->calc->getResult());
    }

    public function testSubtract()
    {
        $this->calc->substract(4);

        $this->assertEquals(-4, $this->calc->getResult());
    }
}
