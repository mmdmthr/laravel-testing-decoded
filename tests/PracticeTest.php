<?php

use PHPUnit\Framework\TestCase;

class DateFormatter {
    protected $stamp;

    public function __construct(DateTime $stamp)
    {
        $this->stamp = $stamp;   
    }

    public function getStamp()
    {
        return $this->stamp;
    }
}

function array_until($stopPoint, $arr)
{
    $index = array_search($stopPoint, $arr);

    if (false === $index) {
        throw new InvalidArgumentException('Key does not exist in array');
    }

    return array_slice($arr, 0, $index);
}

class PracticeTest extends TestCase
{
    public function testHelloWorldTrue()
    {
        $greeting = 'Hello, World.';

        $this->assertTrue($greeting === 'Hello, World.', $greeting);
    }

    public function testHelloWorldEqual()
    {
        $greeting = 'Hello, World.';

        $this->assertEquals('Hello, World.', $greeting);
    }

    public function testLaravelDevsIncludesDayle()
    {
        $names = ['Taylor', 'Shawn', 'Dayle'];
        $this->assertContains('Dayle', $names);
    }

    public function testFamilyRequiresParent()
    {
        $family = [
            'parents' => 'Joe',
            'children' => ['Timmy', 'Suzy']
        ];

        $this->assertArrayHasKey('parents', $family);
    }

    public function testStampMustBeInstanceOfDateTime()
    {
        $date = new DateFormatter(new DateTime);

        $this->assertInstanceOf('DateTime', $date->getStamp());
    }

    public function testFetchesItemsInArrayUntilKey()
    {
        // Arrange
        $names = ['Taylor', 'Dayle', 'Matthew', 'Shawn', 'Neil'];

        // Act
        $result = array_until('Matthew', $names);

        // Assert
        $expected = ['Taylor', 'Dayle'];
        $this->assertEquals($expected, $result);
    }

    public function testThrowsExceptionIfKeyDoesNotExist()
    {
        // tell PHPUnit that we expect this exception. 
        // If it is not thrown, or if another exception is thrown, 
        // then this test will fail.
        $this->expectException(InvalidArgumentException::class);

        // Given this set of data
        $names = ['Taylor', 'Dayle', 'Matthew', 'Shawn', 'Neil'];

        // When I call the array_until function and specify a different key
        // Then an exception should be thrown
        $result = array_until('Bob', $names);
    }
}