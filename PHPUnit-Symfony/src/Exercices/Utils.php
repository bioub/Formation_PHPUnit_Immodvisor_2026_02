<?php

namespace App\Exercices;

class Utils
{
    public function hello(string $name): string
    {
        return "Hello $name";
    }

    public function totalPairs(array $nbs): int
    {
        if (!count($nbs)) {
            return 0;
        }

        return count(array_filter($nbs, function ($nb) {
            return $nb % 2 === 0;
        }));
    }

    public function racineCarre(int $nb): int
    {
        if ($nb < 0) {
           throw new \Exception('nb must be positive');
        }

        return sqrt($nb);
    }

}