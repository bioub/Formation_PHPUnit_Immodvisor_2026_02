<?php

namespace App\Exercices;

use DateTime;

class NotPureExercices
{
    public static function secondsFromNow(DateTime $date, $now = new DateTime()): int {
        return $date->getTimestamp() - $now->getTimestamp();
    }

    public static function pileOuFace($rand = 0): string {
        if (!$rand) {
            $rand = random_int(0,1);
        }
        return $rand === 0 ? 'pile': 'face';
    }
}