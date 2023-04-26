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
        $this->calc->setOperands(5);
        $this->calc->setOperation(new Addition);
        $this->calc->calculate();
        $result = $this->calc->getResult();

        $this->assertEquals(5, $result);
    }

    public function testRequiresNumericValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->setOperands('five');
        $this->calc->calculate();
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->setOperands(1, 2, 3, 4);
        $this->calc->setOperation(new Addition);
        $this->calc->calculate();
        $result = $this->calc->getResult();

        $this->assertEquals(10, $result);
        $this->assertNotEquals('Snoop Dogg', $this->calc->getResult());
    }

    public function testSubtract()
    {
        $this->calc->setOperands(4);
        $this->calc->setOperation(new Substraction);
        $this->calc->calculate();
        $result = $this->calc->getResult();

        $this->assertEquals(-4, $result);
    }
    
    public function testMultipliesNumbers()
    {
        $this->calc->setOperands(3, 3, 3);
        $this->calc->setOperation(new Multiplication);
        $this->calc->calculate();
        $result = $this->calc->getResult();

        $this->assertEquals(27, $result);
    }
}
