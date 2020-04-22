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

    <?php include __DIR__. '/view/header.php';?>
      
    <main>
        <div class="container">

            <div class="main-wrapper">
                <div class="inner-wrapper">
                    <!-- <aside class="left-filters">
                        <div class="filters-wrapper">
                            <form action="" method="POST">

                                <ul class="filters-wrapper">
                                    <li>
                                        <span>Тип</span>
                                        <ul class="filter-type">
                                            <?
                                            // $selectTypes = mysqli_query($link, "SELECT * FROM `types`;");
                                            // if ($selectTypes)
                                            // {
                                            //     $selectTypes = mysqli_fetch_all($selectTypes, MYSQLI_ASSOC);
                                            //     if ($selectTypes)
                                            //     {
                                            //         foreach ($selectTypes as $key => $value) {
                                            //             ?>
                                            //             <li>
                                            //                 <input type="checkbox" id="type-<?=$value['id'];?>" name="types[]" value="<?=$value['id'];?>">
                                            //                 <label for="type-<?=$value['id'];?>"><?=$value['name'];?></label>
                                            //             </li>
                                            //             <?
                                            //         }
                                            //     }
                                            //     else { die(mysqli_error($link)); }
                                            // }
                                            // else { die(mysqli_error($link)); }
                                            ?>

                                        </ul>
                                    </li>

                                    <li>
                                        <span>Форма</span>

                                        <ul class="filter-type">
                                            <?
                                            $selectForms = mysqli_query($link, "SELECT * FROM `forms`;");
                                            if ($selectForms) {
                                                $selectForms = mysqli_fetch_all($selectForms, MYSQLI_ASSOC);
                                                if($selectForms)
                                                {
                                                    foreach ($selectForms as $key2 => $value2) {
                                                        ?>
                                                        <li>
                                                            <input type="checkbox" id="shape-<?=$value2['id'];?>" name="forms[]" value="<?=$value2['id'];?>">
                                                            <label for="shape-<?=$value2['id'];?>"><?=$value2['name'];?></label>
                                                        </li>
                                                        <?
                                                    }
                                                }
                                                else { die(mysqli_error($link)); }
                                            }
                                            else { die(mysqli_error($link)); }
                                            ?>

                                        </ul>
                                    </li>

                                    <li>
                                        <span>Цвет</span>
                                        <ul class="filter-type">
                                            <?
                                            $selectColors = mysqli_query($link, "SELECT * FROM `colors`;");
                                            if ($selectColors)
                                            {
                                                $count = mysqli_num_rows($selectColors);
                                                $selectColors = mysqli_fetch_all($selectColors, MYSQLI_ASSOC);
                                                // echo "<pre>";
                                                //     print_r($selectColors);
                                                // echo "</pre>";
                                            
                                                if ($selectColors)
                                                {
                                                    foreach ($selectColors as $key3 => $value3) {
                                                        ?>
                                                        <li>
                                                            <input type="checkbox" id="color-<?=$value3['id']?>" name="colors[]" value="<?=$value3['id'];?>">
                                                            <label for="color-<?=$value3['id']?>"><?=$value3['hex'];?></label>
                                                        </li>
                                                        <?
                                                    }
                                                }
                                                    
                                                }
                                            ?>

                                        </ul>
                                    </li>

                                </ul>

                                <button class="show-by-filters">Показать</button>
                        </form>
                            
                        </div>
                    </aside> -->

                    <section class="goods">

                        
                            <div class="goods-sort-wrapper">
                            <form action="" method="POST">
                                <div class="goods-sort">
                                    <div class="selects">
                                        <div class="order-by-wrapper">
                                            <span>Сортировать по</span>
                                            <select class="order-by" name="order">
                                                <option disabled>Сортировать по...</option>
                                                <option value="4">По очереди, сначала новые</option>
                                                <option value='1'>Возрастанию цены</option>
                                                <option value='2'>Убыванию цены</option>
                                                <option value='3'>Названию</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="show-by-filters" value="Показать">
                                </div>
                                </form>   
                            </div>
                                             

                        <div class="goods">
                            <?
                            if (empty($_POST['order']) || $_POST['order'] == 4)
                            {
                                $selectAllCandles = mysqli_query($link, 
                                "SELECT 

                                `candles`.`id` AS 'id', `candles`.`name` AS 'name', `candles`.`cost` AS 'price', `types`.`name` AS 'typeName', `forms`.`name_rus` AS 'formName', `colors`.`hex` AS 'colorHex' 

                                FROM 

                                `candles`, `types`, `forms`, `colors` 
                                
                                WHERE 

                                `candles`.`type_id` = `types`.`id` AND
                                `candles`.`form_id` = `forms`.`id` AND
                                `candles`.`color_id` = `colors`.`id` AND
                                `candles`.`type_id` = `types`.`id`

                                ORDER BY `id`;
                                ");
                                
                            }
                            else if ($_POST['order'] == '1')
                            {  
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

                                ORDER BY `candles`.`cost`;
                                ");
                            }

                            else if($_POST['order'] == '2')
                            {
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

                                ORDER BY `candles`.`cost` DESC;
                                ");
                            }

                            else if($_POST['order'] == '3')
                            {

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

                                ORDER BY `candles`.`name`;
                                ");
                            }

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