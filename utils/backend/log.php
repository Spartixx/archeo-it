<?php


function write_log($message, $type) {

    $file = '/var/www/archeo-it/utils/backend/logs.txt';
    $date = date("Y-m-d H:i:s");
    $message = $date . "   |   " . "($type) : " . $message . "\n";

    file_put_contents($file, $message, FILE_APPEND | LOCK_EX);

}