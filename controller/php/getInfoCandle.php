<?php 
    require 'connection.php';
    $id = $_GET['id'];

    $getInfoCandle = mysqli_query($link, 
    "SELECT 
    `candles`.`name` AS `candleName`,
    `candles`.`id` AS `candleId`,
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






//   $idType = $getInfoCandleResult['type_id'];
//     $idForm = $getInfoCandleResult['form_id'];
//     $idColor = $getInfoCandleResult['color_id'];

//     $getAllInfoCandle = mysqli_query($link,
//     "SELECT `types`.`name` AS 'type_name',
//     `forms`.`name_rus` AS 'form_name',
//     `colors`.`hex` AS 'color_name'
// FROM `types`,
//   `forms`,
//   `colors`,
//   `candles`
// WHERE 
//      `candles`.`color_id` = `colors`.`id` AND
//     `candles`.`form_id` = `forms`.`id` AND
//     `candles`.`type_id` = `types`.`id` AND
//       `types`.`id` = $idType AND 
//       `forms`.`id` = $idForm AND
//       `colors`.`id` = $idColor
//     ");
    
?>