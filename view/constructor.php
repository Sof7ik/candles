<?php require 'controller/php/connection.php'; ?>
<div class="constructor-wrapper">
    <h2>КОНСТРУКТОР</h2>
    <form action="controller/php/buy.php" method="POST">

        <div class="inner-constructor-wrapper" id="inner-constructor-wrapper">

            <div class="image-and-buttons">
                <div class="canvas-wrapper">
                    <!-- <canvas id="constructor-canvas-1" width="250px" height="250px"></canvas> -->
                    <canvas id="constructor-canvas-2" width="250px" height="250px"></canvas>
                    <canvas id="constructor-canvas-3" width="250px" height="250px"></canvas>
                    <div class="image"></div>
                </div>
                

                <div class="buttons">
                    <input type="submit" name="submit-btn" value="КУПИТЬ" class="buy-button">
                    <button class="buy-button">В КОРЗИНУ</button>
                </div>
            </div>

            <div class="params">

                <div class="candle-type-select candle-select">
                    <h3>Тип</h3>
                    <div class="type__vars">
                        <?php
                            $getAllTypes = mysqli_query($link, "
                            SELECT id, name FROM `types`;
                            ");
                            $getAllTypesResult = mysqli_fetch_all($getAllTypes, MYSQLI_ASSOC);

                            foreach ($getAllTypesResult as $key1 => $value1) {
                                ?>
                                    <input type="radio" name="type__vars" id="type-vars__<?echo $value1['id'];?>" value="<?echo $value1['id'];?>" required>
                                    <label for="type-vars__<?echo $value1['id'];?>" class="type__vars__label">
                                        <?=$value1['name']; ?>
                                    </label>
                                <?
                            }
                        ?> 
                    </div>
                </div>

                <div class="candle-shape-select candle-select">
                    <h3>Форма</h3>
                    <div class="shape__vars">
                        <?php
                            $getAllShapes = mysqli_query($link, "
                                SELECT id, name FROM `forms`;
                            ");
                            $getAllShapesResult = mysqli_fetch_all($getAllShapes, MYSQLI_ASSOC);

                            foreach ($getAllShapesResult as $key2 => $value2) {
                                ?>
                                <input type="radio" name="shape__vars" id="shape-vars__<?echo $value2['id'];?>" value="<?echo $value2['id'];?>" required class="select-form">
                                <label for="shape-vars__<?echo $value2['id'];?>" class="shape-var <?echo $value2['name'];?>"></label>
                                <?
                            }
                        ?>
                    </div>
                </div>

                <div class="candle-color-select candle-select">
                    <h3>Цвет</h3>
                    <div class="color__vars">
                        <?php
                            $getAllColors = mysqli_query($link, "
                                SELECT id, hex FROM `colors` LIMIT 16;
                            ");
                            $getAllColorsResult = mysqli_fetch_all($getAllColors, MYSQLI_ASSOC);

                            // echo "<pre>";
                            //     print_r($getAllColorsResult);
                            // echo "</pre>";

                            foreach ($getAllColorsResult as $key3 => $value3) {
                                ?>
                                <input type="radio" name="color__vars" id="color-vars__<?echo $value3['id'];?>" value="<?echo $value3['id'];?>" required class="color__vars-select" data-colorhex = "<?echo $value3['hex'];?> ">
                                <label for="color-vars__<?echo $value3['id'];?>" class="color-var" style="background-color: <?echo $value3['hex']; ?>"> </label>
                                <?
                            }
                        ?>

                        <input type="radio" name="color__vars" id="vars__user" value="Юзерная" required>
                        <label for="vars__user" class="color-var input-label"> </label>

                        <input type="color" name="user-color" id="select-candle-color" value="#ff0000">
                            <label for="select-candle-color" class="color-var user"> </label>
                    </div>
                </div>

                <div class="candle-color-select candle-select">
                    <h3>Количество</h3>
                    <div class="quantity">
                        <input type="number" name="quantity" id="quantity" min=1 value="1">
                    </div>
                </div>

                <div class="candle-color-select candle-select">
                    <h3>Цена </h3>
                    <input name=price type="text" id="candle-price" value= "1230" readonly style="border: none; outline: none; background-color: transparent; font-size: 30px;">
                </div>
                
            </div>

        </div>

    </form>
</div>