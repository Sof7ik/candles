<?require 'controller/php/connection.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>заказы</title>

    <link rel="stylesheet" href="view/resources/css/style.css">
    <link rel="stylesheet" href="view/resources/css/header.css">
    <link rel="stylesheet" href="view/resources/css/loginModalWindow.css">
    <link rel="stylesheet" href="view/resources/css/orders.css">
    
</head>
<body>
    <div class="wrapper">

    <?include __DIR__.'\view\header.php';?>

    <main>
        <div class="container">
            <div class="main-wrapper">
                <span>Все Ваши Заказы</span>

                <div class="grid-container">

                    <div class="grid-element">
                        <div class="item">
                            <span class="order-date">2020-09-29 14:53:07</span>

                            <div class="order-info">
                                <img src="/view/resources/img/pics/1.png" alt="candle" class="order-candle">

                                <div class="texts">
                                    <p>Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor</p>
                                    <span>В стакане + с закругленным дном + красная</span>
                                    <span class="item-price">2 * 1000 руб. = 2000 руб.</span>
                                </div>
                            </div>
                            
                        </div>

                        <div class="item-buttons">
                            <button class="item-buttons__buton">Купить снова</button>
                            <button class="item-buttons__buton">Посмотреть детали</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="controller/js/login-window.js"></script>
</body>
</html>

<?php

// SELECT `order_candle`.`candle_id`, `order_candle`.`order_id`, `all_orders`.`user_id`, `all_orders`.`date`, `candles`.`name`, `types`.`name`, `forms`.`name`, `colors`.`hex`, `candles`.`cost` FROM `order_candle`, `all_orders`, `users`, `candles`, `types`, `forms`, `colors` WHERE `order_candle`.`candle_id` = `candles`.`id` AND `order_candle`.`order_id` = `all_orders`.`order_id` AND `all_orders`.`user_id` = `users`.`id` AND `candles`.`type_id` = `types`.`id` AND `candles`.`form_id` = `forms`.`id` AND `candles`.`color_id` = `colors`.`id`


// крутой запрос на вывод заказика, да?

?>