<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'candles';
    $link = mysqli_connect($host, $user, $password, $db);

    if(!$link)
    {
        die("Ошибка при подключении к БД" . mysqli_connect_error($link));
    }
?>