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
            if($result['email'] == $emailAuth || $result['phone'] == $emailAuth && $result['password'] == $passwordAuth){
                $_SESSION['pass'] = $result['password'];
                
                header('Location: ../../index.php');
            }
        }
        else {
            echo 'Еггог';
        }
    }
?>