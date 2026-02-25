<?php

namespace AppTests\Exercices;

use App\Exercices\CoverageExercices;
use PHPUnit\Framework\TestCase;

class CoverageExercicesTest extends TestCase
{

    public function testSumEvenUntil()
    {
        $input = 3;

        $result = CoverageExercices::sumEvenUntil($input);

        $this->assertEquals(2, $result);
    }

    public function testSumEvenUntilWithInputZero()
    {
        $input = 0;

        $result = CoverageExercices::sumEvenUntil($input);

        $this->assertEquals(0, $result);
    }
}
