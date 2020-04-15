<?php
    require_once 'connection.php';
    $buttonAuth = $_POST['buttonAuth'];
    if(isset($buttonAuth)){
        
        $emailAuth = $_POST['emailAuthU'];
        $passwordAuth = $_POST['passwordAuthU'];

        $query = mysqli_query($link, 
        "SELECT * FROM `users`
        WHERE `email` = '$emailAuth' OR `phone` = '$emailAuth' AND `password` = '$passwordAuth'");
        $result = mysqli_fetch_assoc($query);
        if($result){
            if (isset($_COOKIE['userInfo']))
            {
                setcookie(
                    'userInfo',
                    '',
                    time()-3600,
                    '/'
                );

                $cookieName = 'userInfo';
                $cookieValue= serialize($getNewUserResult);
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
            else{
                $cookieName = 'userInfo';
                $cookieValue= serialize($getNewUserResult);
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
        }
        else {
            echo 'Еггог';
        }
?>