<?php
    require_once 'connection.php';

    $button = $_POST['button'];

    if(isset($button)){

        $name = $_POST['nameU'];
        $surname = $_POST['surnameU'];
        $password = $_POST['passwordU'];
        $repeatPassword = $_POST['repeatPasswordU'];
        $mail = $_POST['emailU'];
        $phone = $_POST['telU'];

        if($password == $repeatPassword){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $checkUser = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$mail';");

            if ($checkUser)
            {
                $checkUserResult = mysqli_num_rows($checkUser);
                if($checkUserResult == 0)
                {
                    // echo "Надо бы юзера добвавить";
                    $newUser = mysqli_query($link, "INSERT INTO `users`
                    (`id`, `name`, `surname`, `password`, `email`, `phone`) VALUES 
                    (NULL, '$name', '$surname', '$password', '$mail', '$phone');");

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
                        else
                        {
                            die(mysqli_error($getNewUser));
                        }
                    }
                    else
                    {
                        die(mysqli_error($query));
                    }
                    
                    
                }
                // else
                // {
                //     echo "Есть юзер";
                // }
            }
            
        }
        // else
        // {
        //     echo "Пароли не свопадают";
        //     echo "<br>";

        //     echo $password;
        //     echo "<br>";

        //     echo $repeatPassword;
        //     echo "<br>";
        // }
        
    }
    
?>