<?php
    require_once 'connection.php';
    $button = $_POST['button'];
    if(isset($button)){
        $login = $_POST['loginU'];
        $name = $_POST['nameU'];
        $surname = $_POST['surnameU'];
        $password = $_POST['passwordU'];
        $repeatPassword = $_POST['repeatPasswordU'];
        $mail = $_POST['emailU'];
        $phone = $_POST['telU'];
        if($password == $repeatPassword){
            $query = mysqli_query($link, "INSERT INTO `users`
            (`id`, `login`, `name`, `surname`, `password`, `email`, `phone`)
            VALUES (NULL, '$login', '$name', '$surname', '$password', '$mail', '$phone')");
        }
    }
?>