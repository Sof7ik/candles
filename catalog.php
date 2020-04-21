<?require __DIR__ . '/controller/php/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>

    <link rel="stylesheet" href="view/resources/css/style.css">
    <link rel="stylesheet" href="view/resources/css/header.css">
    <link rel="stylesheet" href="view/resources/css/loginModalWindow.css">
    <link rel="stylesheet" href="view/resources/css/index.css">

    <link rel="stylesheet" href="view/resources/css/leftModalWindow.css">
    <link rel="stylesheet" href="view/resources/css/catalog.css">

</head>
<body>
<div class="wrapper">
    <?php include __DIR__. '/view/modalWindow.html'; ?>

    <?php include __DIR__. '/view/header.php';?>
      
    <main>
        <div class="container">

            <div class="main-wrapper">
                <div class="inner-wrapper">
                    <aside class="left-filters">
                        <div class="filters-wrapper">
                            <ul class="filters-wrapper">
                                <li>
                                    <span>Тип</span>
                                    <ul class="filter-type">

                                        <li>
                                            <input type="checkbox" id="type-1" name="colors">
                                            <label for="type-1">Открытая</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="type-2" name="colors">
                                            <label for="type-2">В стакане</label>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <span>Форма</span>

                                    <ul class="filter-type">

                                        <li>
                                            <input type="checkbox" id="shape-1" name="colors">
                                            <label for="shape-1">Длинная</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" id="shape-2" name="colors">
                                            <label for="shape-2">С круглым низом</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" id="shape-3" name="colors">
                                            <label for="shape-3">Квадратная</label>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <span>Цвет</span>
                                    <ul class="filter-type">
                                        <li>
                                            <input type="checkbox" id="color-1" name="colors">
                                            <label for="color-1">Красный</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color-2" name="colors">
                                            <label for="color-2">Красный</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color-3" name="colors">
                                            <label for="color-3">Красный</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color-4" name="colors">
                                            <label for="color-4">Красный</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="color-5" name="colors">
                                            <label for="color-5">Красный</label>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                            <button class="show-by-filters">Показать</button>
                        </div>
                        
                        
                    </aside>

                    <section class="goods">

                        <div class="goods-sort-wrapper">
                            <div class="goods-sort">
                                <div class="selects">
                                    <div class="order-by-wrapper">
                                        <span>Сортировать по</span>
                                        <select class="order-by">
                                            <option disabled>Сортировать по...</option>
                                            <option>Возрастанию цены</option>
                                            <option>Убыванию цены</option>
                                            <option>Названию</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <button class="show-by-filters">Показать</button>
                                
                            </div>
                        </div>

                        <div class="goods">
                            <?
                            $selectAllCandles = mysqli_query($link, 
                            "SELECT 

                            `candles`.`id` AS 'id', `candles`.`name` AS 'name', `candles`.`cost` AS 'price', `types`.`name` AS 'typeName', `forms`.`name` AS 'formName', `colors`.`hex` AS 'colorHex' 

                            FROM 

                            `candles`, `types`, `forms`, `colors` 
                            
                            WHERE 

                            `candles`.`type_id` = `types`.`id` AND
                            `candles`.`form_id` = `forms`.`id` AND
                            `candles`.`color_id` = `colors`.`id` AND
                            `candles`.`type_id` = `types`.`id`
                            ");
                            if ($selectAllCandles)
                            {
                                $selectAllCandles = mysqli_fetch_all($selectAllCandles, MYSQLI_ASSOC);

                                if ($selectAllCandles) {
                                    foreach ($selectAllCandles as $key => $value) {
                                        ?>
                                        <div class="goods__candle-wrapper">
                                            <div class="goods__candle">
                                                <img src="view/resources/img/pics/1.png" alt="candle" class="goods__candle-img">
                                                <span class="candle-name"><?=$value['name'];?></span>
                                                <div class="candle-params">
                                                    <span><?=$value['typeName'];?></span>
                                                    <span><?=$value['formName']?></span>
                                                    <span><?=$value['colorHex'];?></span>
                                                </div>
                                                <span class="candle-price"><?=$value['price'];?> руб.</span>

                                                <button class="candle-buy">Купить!</button>
                                            </div>
                                        </div>
                                        <?
                                    }
                                }
                                else {
                                    die(mysqli_error($link));
                                }

                            }

                            else
                            {
                                die(mysqli_error($link));
                            }

                            ?>
                        </div>
                        
                    </section>

                </div>
            </div>

        </div>
    </main>

    <script SRC="controller/js/login-window.js"></script>
</body>
</html>