<?php require './controller/php/connection.php'; ?>
<div class="constructor-wrapper">
    <h2>КОНСТРУКТОР</h2>
    <form action="/controller/php/buy.php" method="POST">

        <div class="inner-constructor-wrapper" id="inner-constructor-wrapper">

            <div class="image-and-buttons">
                <div class="image"></div>

                <div class="buttons">
                    <input type="submit" name="submit-btn" value="КУПИТЬ">
                    <button>В КОРЗИНУ</button>
                </div>
            </div>

            <div class="params">

                <div class="candle-type-select candle-select">
                    <h3>Тип</h3>
                    <div class="type__vars">
                        <input type="radio" name="type__vars" id="vars__opened" value="1" required>
                        <label for="vars__opened" class="type__vars__label">
                            <p class="type-var">Открытая</p>
                        </label>
                        
                        <input type="radio" name="type__vars" id="vars__glassed" value="2" required>
                        <label for="vars__glassed" class="type__vars__label">
                            <p class="type-var">В стакане</p>
                        </label>
                        
                    </div>
                </div>

                <div class="candle-shape-select candle-select">
                    <h3>Форма</h3>
                    <div class="shape__vars">
                        <input type="radio" name="shape__vars" id="vars__tall" value="1" required>

                        <label for="vars__tall" class="shape-var tall"></label>

                        <input type="radio" name="shape__vars" id="vars__circle" value="2" required>

                        <label for="vars__circle" class="shape-var circle"></label>

                        <input type="radio" name="shape__vars" id="vars__rectangle" value="3" required>

                        <label for="vars__rectangle" class="shape-var rectangle"></label>

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

                            foreach ($getAllColorsResult as $key => $value) {
                                ?>
                                <input type="radio" name="color__vars" id="vars__<?echo $value['id'];?>" value="<?echo $value['id'];?>" required>
                                <label for="vars__<?echo $value['id'];?>" class="color-var" style="background-color: <?echo $value['hex']; ?>"> </label>
                                <?
                                
                            }
                        ?>
                        <!-- <input type="radio" name="color__vars" id="vars__red" value="1" required>
                        <label for="vars__red" class="color-var red"> </label>

                        <input type="radio" name="color__vars" id="vars__green" value="2" required>
                        <label for="vars__green" class="color-var green"> </label>

                        <input type="radio" name="color__vars" id="vars__blue" value="3" required>
                        <label for="vars__blue" class="color-var blue"> </label> -->

                        <input type="radio" name="color__vars" id="vars__user" value="Юзерная" required>
                        <label for="vars__user" class="color-var input-label"> </label>

                        <input type="color" name="user-color" id="select-candle-color" value="#ff0000">
                            <label for="select-candle-color" class="color-var user"> </label>

                        <!-- <div class="color-var user"></div> -->
                    </div>
                </div>

                <div class="candle-color-select candle-select">
                    <h3>Количество</h3>
                    <div class="quantity">
                        <input type="number" name="quantity" id="quantity" min=1 value="1">
                    </div>
                </div>
                
            </div>

        </div>

    </form>
</div>