<?php

namespace AppTests\Exercices;

use App\Exercices\ExceptionExercices;
use PHPUnit\Framework\TestCase;

class ExceptionExercicesTest extends TestCase
{
    public function testSafeDivideWithZeroDivision()
    {
        $input = 0;

        $this->expectException(\InvalidArgumentException::class);

        ExceptionExercices::safeDivide(10, $input);
    }

    public function testSafeDivideWithPositiveNumber()
    {
        $input = 10;

        $result = ExceptionExercices::safeDivide(10, $input);

        $this->assertEquals(1, $result);
    }

    public function testSafeDivideWithZero()
    {
        $input = -10;

        $result = ExceptionExercices::safeDivide(0, $input);

        $this->assertEquals(0, $result);
    }
}
