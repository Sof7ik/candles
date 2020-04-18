<?php
    require_once __DIR__ . '/controller/php/connection.php';

    if (isset($_COOKIE['userInfo']))
    {
        header('Location: ../../index.php');
    }

    $mail = $_POST['email'];

    $checkUser = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$mail';");

    if ($checkUser)
    {
        $checkUserResult = mysqli_num_rows($checkUser);
        if ($checkUserResult != 0)
        {
            echo "1";
        }
        else {
            echo "0";
        }
        // echo $checkUserResult == 0 ? '1' : '0';
    }
?>