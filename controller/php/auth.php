<?php
    require_once 'connection.php';
    $buttonAuth = $_POST['buttonAuth'];
    if(isset($buttonAuth)){
        
        $loginAuth = $_POST['loginAuthU'];
        $passwordAuth = $_POST['passwordAuthU'];
        $repeatPasswordAuth = $_POST['repeatPasswordAuthU'];

        $query = mysqli_query($link, 
        "SELECT * FROM `users`
        WHERE `login` = '$loginAuth' AND `password` = '$passwordAuth'");
        $result = mysqli_fetch_assoc($query);
        if($result){
            if($result['login'] == $loginAuth && $result['password'] == $passwordAuth){
                header('Location: ../../index.php');
            }
        }
        else {
            echo 'Еггог';
        }
    }
?>