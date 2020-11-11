<?php 
namespace App\Logger;


class Logger 
{

    public static function log ($action = '', $message = '', $data = null)
    {
        $time = date("d/m/Y H:i:s");
        $fileToLog = fopen("src/Logger/test.log", "a");
        fwrite($fileToLog, "Time: {$time}\r\n");
        fwrite($fileToLog, "Action: {$action} \r\n");
        fwrite($fileToLog, "Message: {$message}\r\n");
        fwrite($fileToLog, "Data: {$data}");
        fclose($fileToLog);
    }
}

// logger($action, $message, $array_data);

