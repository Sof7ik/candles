<?php
    require_once 'connection.php';

    $userId = unserialize($_COOKIE['userInfo'])['id'];

    $getAllUserSOrders = mysqli_query($link, "SELECT * FROM `orders` WHERE `orders`.`user_id` = $userId;");
    $getAllUserSOrdersResult = mysqli_fetch_all($getAllUserSOrders, MYSQLI_ASSOC);

    // echo "<pre>";

    //     print_r($getAllUserSOrdersResult);

    // echo "</pre>";

    foreach ($getAllUserSOrdersResult as $key => $value) {
        $order_id = $value['order_id'];
        ?>
            <div class="grid-element">
                <span class="order-date"><?php echo $value['date']; ?></span>
                <?php 

                    $query =

                    "SELECT
                    `candles`.`id` AS 'candle_id',
                    `candles`.`name` AS 'candle_name',
                    `candles`.`cost` AS 'candle_price',
                    `types`.`name` AS 'candle_type',
                    `forms`.`name` AS 'candle_form',
                    `colors`.`hex` AS 'candle_color',
                    `orders`.`order_id` AS 'order_id',
                    `order_candle`.`quantity` AS `candle_quantity`,
                    -- `users`.`id` AS 'user_id',
                    `orders`.`date` AS 'order_date'
                FROM
                    `candles`,
                    `types`,
                    `forms`,
                    `colors`,
                    `orders`,
                    `users`,
                    `order_candle`
                WHERE
                    `candles`.`type_id` = `types`.`id` AND 
                    `candles`.`form_id` = `forms`.`id` AND 
                    `candles`.`color_id` = `colors`.`id` AND 
                    `orders`.`order_id` = `order_candle`.`order_id` AND
                    `orders`.`order_id` = $order_id AND
                    `order_candle`.`candle_id` = `candles`.`id` AND 
                    `orders`.`user_id` = `users`.`id` AND 
                    `orders`.`user_id` = $userId
                    
                    ";


                    $selectAllOrders = mysqli_query($link, $query);
                    if ($selectAllOrders)
                    {
                        $selectAllOrdersResult = mysqli_fetch_all($selectAllOrders, MYSQLI_ASSOC);

                        // echo "<pre>";

                        //     print_r($selectAllOrdersResult);

                        // echo "</pre>";

                        foreach ($selectAllOrdersResult as $key => $value) {
                            
                            if (count($value) > 0)
                            {
                                // echo count($value);
                                ?>
                                     <div class="item">

                                        <div class="order-info">

                                            <img src="/view/resources/img/pics/1.png" alt="candle" class="order-candle">

                                            <div class="texts">
                                                <p><?php echo $value['candle_name']; ?></p>
                                                <span>
                                                    <? 
                                                    echo $value['candle_type'] . ' + ' . 
                                                    $value['candle_form'] . ' + ' . 
                                                    $value['candle_color']; 
                                                    ?>
                                                </span>
                                            </div>

                                        </div>

                                        <span class="item-price">
                                            <?echo $value['candle_quantity'];?> x <?echo $value['candle_price']; ?> руб. 
                                            = <? echo intval($value['candle_quantity']) * intval($value['candle_price']) . " руб."; ?>
                                        </span>
                                        
                                    </div>
                                <?
                            }
                        }
                    }
                    else {
                        die(mysqli_error($link));
                    }
                ?>
                

                <div class="item-buttons">
                    <button class="item-buttons__buton">Купить снова</button>
                    <button class="item-buttons__buton">Посмотреть детали</button>
                </div>
            </div>
        <?
    }

    // крутой запрос на вывод заказика, да?
?>