<?php

namespace AppTests\Exercices;

use App\Exercices\ValidatorExercices;
use PHPUnit\Framework\TestCase;

class ValidatorExercicesTest extends TestCase
{

    public function testIsValidEmailWithValidEmail()
    {
        $email = 'toto@company.com';

        $result = ValidatorExercices::isValidEmail($email);

        $this->assertTrue($result);
    }

    public function testIsValidEmailWithInvalidEmail()
    {
        $email = 'toto@ company.com';

        $result = ValidatorExercices::isValidEmail($email);

        $this->assertFalse($result);
    }

    public function testIsPositiveWithPositiveNumber()
    {
        $number = 10;
        $result = ValidatorExercices::isPositive($number);
        $this->assertTrue($result);
    }

    public function testIsPositiveWithNegativeNumber()
    {
        $number = -5;
        $result = ValidatorExercices::isPositive($number);
        $this->assertFalse($result);
    }

    public function testIsPositiveWithZero()
    {
        $number = 0;
        $result = ValidatorExercices::isPositive($number);
        $this->assertFalse($result);
    }

    public function testIsBetween()
    {
        // Test avec un nombre au milieu
        $this->assertTrue(ValidatorExercices::isBetween(5, 1, 10));

        // Test avec les bornes
        $this->assertTrue(ValidatorExercices::isBetween(1, 1, 10));
        $this->assertTrue(ValidatorExercices::isBetween(10, 1, 10));

        // Test en dehors de l'intervalle
        $this->assertFalse(ValidatorExercices::isBetween(0, 1, 10));
        $this->assertFalse(ValidatorExercices::isBetween(11, 1, 10));
    }
}
