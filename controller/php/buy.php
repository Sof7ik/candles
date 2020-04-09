<?php

    echo "Куплено!";
    echo "<br>";

    echo $_POST['type__vars'];
    echo "<br>";

    echo $_POST['shape__vars'];
    echo "<br>";

    echo $_POST['color__vars'];
    echo "<br>";
    
    if ($_POST['color__vars'] == 'Юзерная')
    {
        echo $_POST['user-color'];
        echo "<br>"; 
    }

    echo $_POST['submit-btn'];
    echo "<br>";

?>