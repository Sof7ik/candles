<?php
    require_once 'connection.php';
    $buttonAuth = $_POST['buttonAuth'];
    if (isset($buttonAuth))
    {
        $login = $_POST['emailAuthU'];
        $pass = $_POST['passwordAuthU'];

        $query = mysqli_query($link, 
        "SELECT * FROM `users` WHERE 
        `email` = '$login' OR 
        `phone` = '$login' AND 
        `password` = '$pass';");

        
        if($query) {
            $result = mysqli_fetch_assoc($query);
 
            $cookieName = 'userInfo';
            $cookieValue = serialize($result);
            // $cookieValue = json_encode($result);
            $expire = time()+604800;
            $path = '/';
            
            setcookie(
                $cookieName,
                $cookieValue,
                $expire,
                $path
            );

            header('Location: ../../index.php');
        }
        else {
            die(mysqli_error($query));
        }
    }
?>