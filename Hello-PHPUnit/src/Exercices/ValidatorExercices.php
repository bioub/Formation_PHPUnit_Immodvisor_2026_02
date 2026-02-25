<?php

declare(strict_types=1);

namespace App\Exercices;

class ValidatorExercices
{
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isPositive(int $number): bool
    {
        return $number > 0;
    }

    public static function isBetween(int $number, int $min, int $max): bool
    {
        return $number >= $min && $number <= $max;
    }
}
