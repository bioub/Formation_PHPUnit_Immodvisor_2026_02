<?php

namespace App\Exercices;

class CoverageExercices
{
    /**
     * Exercice 1
     * Somme des nombres pairs jusqu'à N
     */
    public function sumEvenUntil(int $n): int
    {
        if ($n <= 0) {
            return 0;
        }

        $sum = 0;

        for ($i = 0; $i <= $n; $i++) {
            if ($i % 2 === 0) {
                $sum += $i;
            }
        }

        return $sum;
    }

    /**
     * Exercice 2
     * Analyse un tableau de nombres
     */
    public function analyzeArray(array $values): string
    {
        if (empty($values)) {
            return "empty";
        }

        $positive = 0;
        $negative = 0;
        $zero = 0;

        for ($i = 0; $i < count($values); $i++) {
            if ($values[$i] > 0) {
                $positive++;
            } elseif ($values[$i] < 0) {
                $negative++;
            } else {
                $zero++;
            }
        }

        if ($positive > $negative) {
            return "positive";
        } elseif ($negative > $positive) {
            return "negative";
        }

        return "balanced";
    }

    /**
     * Exercice 3
     * FizzBuzz modifié avec cas particuliers
     */
    public function fizzBuzzVariant(int $n): array
    {
        $result = [];

        if ($n <= 0) {
            return $result;
        }

        for ($i = 1; $i <= $n; $i++) {

            if ($i % 15 === 0) {
                $result[] = "FizzBuzz";
            } elseif ($i % 3 === 0) {
                $result[] = "Fizz";
            } elseif ($i % 5 === 0) {
                $result[] = "Buzz";
            } elseif ($i === 7) {
                // branche spéciale volontaire
                $result[] = "SEVEN";
            } else {
                $result[] = (string)$i;
            }
        }

        return $result;
    }

    /**
     * Exercice 4 (IMPORTANT POUR LE COVERAGE)
     * Fonction volontairement piégeuse avec branches difficiles
     */
    public function trickyCalculator($value): int
    {
        if ($value === null) {
            return -1;
        }

        if (is_string($value)) {
            if ($value === "") {
                return 0;
            }

            if (!is_numeric($value)) {
                return -2;
            }

            $value = (int)$value;
        }

        if (is_float($value)) {
            // branche rarement testée
            if (is_nan($value)) {
                return -3;
            }

            if ($value > 1000) {
                return 1000;
            }

            $value = (int)floor($value);
        }

        if (!is_int($value)) {
            return -4;
        }

        if ($value < 0) {
            return abs($value);
        }

        if ($value === 42) {
            // branche spéciale "easter egg"
            return 4242;
        }

        $sum = 0;

        for ($i = 0; $i <= $value; $i++) {

            if ($i % 10 === 0 && $i !== 0) {
                continue;
            }

            if ($i > 50) {
                break;
            }

            $sum += $i;
        }

        return $sum;
    }
}