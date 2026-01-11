<?php

class Log {

    private $filename;

    function __construct($logname, $message){

        $this->filename = "./var/log/" . $logname . ".log";

        $date = new DateTime();
        $message = $date->format("Y-m-d h:i:s") ." / ". $message . "\r\n";

        if (!file_exists($this->filename)) {
            touch($this->filename);
        }
            $file = fopen($this->filename, 'a');
            fwrite($file, $message);
            fclose($file);
    }
}