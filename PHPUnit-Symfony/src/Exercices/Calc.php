<?php

namespace App\Exercices;

class Calc
{
    // Fonction Pure
    // 3 particularités idéales pour un test
    // - prédictive (appelée avec 1 et 2 son retour est toujours 3)
    // - n'a pas de dépendance (pas de dépendance externe (database, API REST...))
    // - ne modifie pas ses paramètres d'entrée (en exécutant sum, je ne risque
    // d'impacter le test suivant)
    public function sum(float $a, float $b)
    {
        return $a + $b;
    }

    //  - non prédictive
    public function randomInt(int $min, int $max) {
        return mt_rand($min, $max);
    }
}