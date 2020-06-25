<?php
    $host = 'localhost';
    $user = 'f0406051_candles';
    $password = 'root';
    $db = 'f0406051_candles';
    $link = mysqli_connect($host, $user, $password, $db);

    if(!$link)
    {
        die("Ошибка при подключении к БД" . mysqli_connect_error($link));
    }
?>