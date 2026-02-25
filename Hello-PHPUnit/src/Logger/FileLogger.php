<?php

namespace App\Logger;

/*
 * SOLID
 * S : Single Responsibility Principle
 * O : Open-Closed Principle
 * L : Liskov Substitution Principle
 * I : Interface Segregation Principle
 * D : Dependency Inversion Principle
 */

class FileLogger
{
    public function log($filePath, $level, $message): void
    {
        $datetime = date('Y-m-d H:i:s');
        $logMessage = "[$level] - $datetime - $message";

        $fic = fopen($filePath, 'a');
        fwrite($fic, $logMessage);
        fclose($fic);
    }
}