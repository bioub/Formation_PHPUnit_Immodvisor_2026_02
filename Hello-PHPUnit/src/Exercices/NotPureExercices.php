<?php

namespace App\Exercices;

use DateTime;

class NotPureExercices
{
    public static function secondsFromNow(DateTime $date): int {
        $now = new DateTime();
        return $date->getTimestamp() - $now->getTimestamp();
    }

    public static function pileOuFace(): string {
        $rand = mt_rand(0, 1);
        return $rand === 0 ? 'pile': 'face';
    }
}