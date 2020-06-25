<?php
    require_once 'connection.php';

    if (isset($_COOKIE['userInfo']))
    {
        header('Location: ../../index.php');
    }

    $buttonAuth = $_POST['buttonAuth'];
    if (isset($buttonAuth))
    {
        $login = $_POST['emailAuthU'];
        $pass = $_POST['passwordAuthU'];

        $query = mysqli_query($link, 
        "SELECT * FROM `users` WHERE `email` = '$login' OR `phone` = '$login';");

        // echo "SELECT * FROM `users` WHERE `email` = '$login' OR `phone` = '$login'";
        // echo "<br>";

        if($query) {
            
            $result = mysqli_fetch_assoc($query);
            $password = password_verify($pass, $result['password']);

            if ($pass == $password)
            {
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
            else
            {
                echo "Пароли в базе и тут не совпадают";
                
            }
        }
        else {
            die(mysqli_error($link));
        }
    }
?>