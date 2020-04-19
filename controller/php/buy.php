<?php
    require_once 'connection.php';

    // заберем цвета из базы, чтобы сравнить их с выбранным цветом
    $getColors = mysqli_query($link, 
    "
    SELECT id, hex FROM `colors`;
    ");
    $getColorsResult = mysqli_fetch_all($getColors, MYSQLI_ASSOC);

    // Если пользователь выбрал пункт "пользовательский цвет" в конфигураторе, то мы сравниваем все цвета из массива с выбранным
    if ($_POST['color__vars'] == 'Юзерная')
    {
        $color = $_POST['user-color'];

        foreach ($getColorsResult as $key => $value)
        {
            // если цвет совпал, то мы выходим из foreach и не продолжаем сранение
            if ($color == $value['hex'])
            {
                break;
            }
            // если не совпал - заносим в базу данных в таблицу 'colors'
            else
            {   
                $newColor = mysqli_query($link, "
                    INSERT INTO `colors` 
                    (`id`, `name`, `hex`) VALUES
                    (NULL, '', '$color');
                ");
                // если запрос на добавление цвета прошел без ошибок, мы забираем из таблицы последний цвет
                if($newColor)
                {
                    $getLastColor = mysqli_query($link, 
                    "
                        SELECT id FROM `colors` ORDER BY `id` DESC LIMIT 1;
                    ");
                    // если запрос на последний цвет прошел успешно - суем его id в переменную color, которую впоследствии будем пихать в БД в таблицу 'candles'
                    if ($getLastColor)
                    {
                        $getLastColorResult = mysqli_fetch_assoc($getLastColor);
                        $color = $getLastColorResult['id'];
                    }
                    // иначе останавливаем скрипт и выводим ошибку
                    else {
                        die("Ошибкка: " . mysqli_error($link));
                    }
                    
                }
                //если запрос на добавление цвета произошел с ошибками - останавливаем скрипт и выводим ошибку
                else
                {
                    die("Ошибкка: " . mysqli_error($link));
                }
                break;
            }
        }
    }
    //если выбран цвет из уже доступных в базе, а не польщовательский, то мы суем в color его id
    else
    {
        $color = $_POST['color__vars'];
    }

    //забираем остальные параметры свечки
    $type = $_POST['type__vars'];
    $shape = $_POST['shape__vars'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    echo $type . " - Тип";
    echo "<br>";
    echo $shape. " - Форма";
    echo "<br>";
    echo $quantity. " - Количество";
    echo "<br>";
    echo $price. " - Цена";
    echo "<br>";
    echo $color . " - цвет";
    echo "<br>";

    $checkCandle = mysqli_query($link, 
    "SELECT 
    `type_id`, 
    `form_id`, 
    `color_id` 

    FROM 
    `candles`

    where

    `candles`.`type_id` = $type AND
    `candles`.`form_id` = $shape AND
    `candles`.`color_id` = $color
    ;");

    if ($checkCandle)
    {
        $countCheckCandle = mysqli_num_rows($checkCandle);
        if ($countCheckCandle > 0)
        {
            $checkCandleResult = mysqli_fetch_all($checkCandle, MYSQLI_ASSOC);
            echo "<pre>";
                print_r($checkCandleResult);
            echo "<pre>";

            echo "<p style='color: red; font-size: 40px;'>Такая свечка уже есть</p>";
        }
        else
        {
            // вставляем это все в БД в таблицу 'candles'
            $newCandle = mysqli_query($link, 
            "INSERT INTO `candles`
            (`id`, `name`, `type_id`, `form_id`, `color_id`, `cost`) VALUES 
            (NULL, 'Юзерная свеча 1', $type, $shape, $color, $price)
            ");

            echo "INSERT INTO `candles`
            (`id`, `name`, `type_id`, `form_id`, `color_id`, `cost`) VALUES 
            (NULL, 'Юзерная свеча 1', $type, $shape, $color, $price)";
            echo "<br>";

            if($newCandle)
            {
                // header('Location: ../../index.php');
                $lastCandle = mysqli_query($link, "SELECT id FROM `candles` ORDER BY `id` DESC LIMIT 1;");
                if($lastCandle)
                {
                    $lastCandleResult = mysqli_fetch_assoc($lastCandle);
                    $lastCandleId = $lastCandleResult['id'];
                    $userId = unserialize($_COOKIE['userInfo'])['id'];
                    $newOrder = mysqli_query($link, 
                    "INSERT INTO `orders`
                    (`order_id`, `user_id`, `date`) VALUES 
                    (NULL, $userId, NOW());");
                    

                    echo "INSERT INTO `orders`
                    (`order_id`, `user_id`, `date`) VALUES 
                    (NULL, $userId, NOW());";
                    echo "<br>";

                    if ($newOrder)
                    {  
                        $lastOrder = mysqli_query($link, "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1;");
                        $lastOrdereResult = mysqli_fetch_assoc($lastOrder);
                        $lastOrderId = $lastOrdereResult['order_id'];

                        $last = mysqli_query($link, 
                        "INSERT INTO `order_candle`
                        (`order_id`, `candle_id`, `quantity`) VALUES 
                        ($lastOrderId,$lastCandleId,$quantity)");

                        echo "INSERT INTO `order_candle`
                        (`order_id`, `candle_id`, `quantity`) VALUES 
                        ($lastOrderId,$lastCandleId,$quantity)";
                        echo "<br>";
                        if (!$last)
                        {
                            die("Ошибкка: " . mysqli_error($link)); 
                        }
                    }
                    else
                    {
                        die("Ошибкка: " . mysqli_error($link)); 
                    }
                }
                else 
                {
                    die("Ошибкка: " . mysqli_error($link));
                }
            }
            // если что-то не так, то выводим ошибку
            else
            {
                die("Ошибкка: " . mysqli_error($link));
            }
        }
    }
    else
    {
        die(mysqli_error($link));
    }
?>