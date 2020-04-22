<?php 
    require 'connection.php';
    $id = $_GET['id'];
    $getInfoCandle = mysqli_query($link, "SELECT * FROM `candles` WHERE id = $id");
    $getInfoCandleResult = mysqli_fetch_assoc($getInfoCandle);

    $idType = $getInfoCandleResult['type_id'];
    $idForm = $getInfoCandleResult['form_id'];
    $idColor = $getInfoCandleResult['color_id'];

    $getAllInfoCandle = mysqli_query($link,
    "SELECT `types`.`name` AS 'type_name',
            `forms`.`name_rus` AS 'form_name',
            `colors`.`name` AS 'color_name'
     FROM `types`,
          `forms`,
          `colors`
     WHERE 
          `types`.`id` = $idType AND 
          `forms`.`id` = $idForm AND 
          `colors`.`id` = $idColor
    ");
    
    if($getAllInfoCandle){
        $getAllInfoCandleResult = mysqli_fetch_assoc($getAllInfoCandle);
        if($getAllInfoCandleResult){
            echo json_encode($getAllInfoCandleResult, JSON_UNESCAPED_UNICODE);
        }
    }
    
?>