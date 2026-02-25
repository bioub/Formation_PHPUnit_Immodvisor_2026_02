<?php

namespace App\Logger;

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