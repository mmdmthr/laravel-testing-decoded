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
        // Mock all outside objects.
        // We're not interested in testing those
        // They should have their own tests
        $mock = Mockery::mock('Addition');

        // All we care about is verifying that
        // the proper method was called
        $mock->shouldReceive('run')
             ->once()
             ->with(5, 0)
             ->andReturn(5);

        $this->calc->setOperands(5);

        // Rather than instantiate Addition
        // we pass in the mock object
        $this->calc->setOperation($mock);

        // And then it's business per usual!
        $result = $this->calc->calculate();

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
        $result = $this->calc->calculate();

        $this->assertEquals(10, $result);
        $this->assertNotEquals('Snoop Dogg', $this->calc->getResult());
    }

    public function testSubtract()
    {
        $this->calc->setOperands(4);
        $this->calc->setOperation(new Substraction);
        $result = $this->calc->calculate();

        $this->assertEquals(-4, $result);
    }
    
    public function testMultipliesNumbers()
    {
        $this->calc->setOperands(3, 3, 3);
        $this->calc->setOperation(new Multiplication);
        $result = $this->calc->calculate();

        $this->assertEquals(27, $result);
    }
}
