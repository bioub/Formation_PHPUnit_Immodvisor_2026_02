<?php

namespace AppTests\Utils;

use App\Utils\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testSum()
    {
        // Given / Arrange
        $nb1 = 2;
        $nb2 = 5;

        // When / Act
        $result = Calculator::sum($nb1, $nb2);

        // Then / Assert
        $this->assertEquals(7, $result);
    }

    public function testSumWithoutGivenWhenThen()
    {
        $this->assertEquals(3, Calculator::sum(1, 2));
        $this->assertEquals(6, Calculator::sum(3, 3));
        $this->assertEquals(7, Calculator::sum(3, 4));
    }
}