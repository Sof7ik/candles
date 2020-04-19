<?php
    require_once 'connection.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];

    // echo $password;
    // echo "\n";
    // echo $repeatPassword;
    // echo "\n";

    if($password == $repeatPassword)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        // echo "Надо бы юзера добавить";
        $newUser = mysqli_query($link, "INSERT INTO `users`
        (`id`, `name`, `surname`, `password`, `email`, `phone`, `address`) VALUES 
        (NULL, '$name', '$surname', '$password', '$mail', '$phone', NULL)");

        // echo "\n";
        // echo "INSERT INTO `users`
        // (`id`, `name`, `surname`, `password`, `email`, `phone`, `address`) VALUES 
        // (NULL, '$name', '$surname', '$password', '$mail', '$phone', NULL)";

        if ($newUser)
        {
            $getNewUser = mysqli_query($link, "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1;");
            if($getNewUser)
            {   
                $getNewUserResult = mysqli_fetch_assoc($getNewUser);

                // echo "<pre>";
                //     print_r($getNewUserResult);
                // echo "</pre>";
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
                }
            }
            else
            {
                die(mysqli_error($getNewUser));
            }
        }
        else
        {
            die(mysqli_error($newUser));
        }
                
    }
    else
    {
        echo "Пароли не свопадают";
        echo "<br>";

        echo $password;
        echo "<br>";

        echo $repeatPassword;
        echo "<br>";
    }
    
?>