<?php 
    require 'connection.php';
    $id = $_GET['id'];

    $getInfoCandle = mysqli_query($link, 
    "SELECT 
    `candles`.`name` AS `candleName`,
    `candles`.`id` AS `candleId`,
    `candles`.`cost` AS `price`,
    `types`.`name` AS `typeName`,
    `forms`.`name_rus` AS `formName`,
    `colors`.`hex` AS `colorHex`

    FROM 

    `candles`, `types`, `forms`, `colors`
    
    WHERE 
    
    `candles`.`id` = $id AND
    `candles`.`type_id` = `types`.`id` AND
    `candles`.`form_id` = `forms`.`id` AND
    `candles`.`color_id` = `colors`.`id`
    
    ");

    if($getInfoCandle)
    {
        $getInfoCandle = mysqli_fetch_assoc($getInfoCandle);
        if ($getInfoCandle)
        {
            echo json_encode($getInfoCandle, JSON_UNESCAPED_UNICODE);
        }
        else {die(mysqli_error($link));}
    }
    else {die(mysqli_error($link));}

?>