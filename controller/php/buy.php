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
            if ($color == $value['hex'])
            {
                break;
            }
            else
            {   
                $newColor = mysqli_query($link, "
                    INSERT INTO `colors` 
                    (`id`, `name`, `hex`) VALUES
                    (NULL, '', '$color');
                ");
                if($newColor)
                {
                    $getLastColor = mysqli_query($link, 
                    "
                        SELECT id FROM `colors` ORDER BY `id` DESC LIMIT 1;
                    ");
                    $getLastColorResult = mysqli_fetch_assoc($getLastColor);
                    $color = $getLastColorResult['id'];
                    echo $color;
                }
                else
                {
                    die("Ошибкка: " . mysqli_error($link));
                }
                break;
                
            }
        }
    }
    else
    {
        $color = $_POST['color__vars'];
    }
    
    $type = $_POST['type__vars'];
    $shape = $_POST['shape__vars'];
    $quantity = $_POST['quantity'];

    $newCandle = mysqli_query($link, "
        INSERT INTO `candles`
        (`id`, `name`, `type_id`, `form_id`, `color_id`, `cost`) VALUES 
        (NULL, 'Юзерная свеча 1', $type, $shape, $color, 1000)
    ");
?>