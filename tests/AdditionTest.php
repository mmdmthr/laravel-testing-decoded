<?php

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testFindsTheSumOfNumbers()
    {
        $addition = new Addition;
        $sum = $addition->run(5, 0);

        $this->assertEquals(5, $sum);
    }
}