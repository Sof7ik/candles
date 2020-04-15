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
            $checkUser = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = $mail;");
            if ($checkUser)
            {
                $checkUserResult = mysqli_num_rows($checkUser);
                if($checkUserResult > 0)
                {
                    echo "Пользователь с таким email уже существует!";
                }
            }
            else
            {
                $query = mysqli_query($link, "INSERT INTO `users`
                (`id`, `name`, `surname`, `password`, `email`, `phone`) VALUES 
                (NULL, '$name', '$surname', '$password', '$mail', '$phone');");
                echo $query;

                if ($query)
                {
                    
                    $getNewUser = mysqli_query($link, "
                        SELECT id, name, surname FROM `users` ORDER BY `id` DESC LIMIT 1;
                    ");
                    $getNewUserResult = mysqli_fetch_assoc($getNewUser);
                    ?>
                        <pre>
                            <?
                                print_r($getNewUserResult);
                            ?>
                        </pre>
                    <?
                }
                else
                {
                    die(mysqli_error($query));
                }
            }
            
        }
    }

        // $cookieName = 'userId';
        // $cookieValue = 
        // setcookie(
        //     $name, 
        //     $value, 
        //     $expire, 
        //     $path, 
        //     $domain, 
        //     $secure, 
        //     $httponly
        // );
        // header('Location: ../../index.php');
    
?>