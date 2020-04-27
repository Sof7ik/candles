<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аромасвечи</title>

    <link rel="stylesheet" href="view/resources/css/style.css">
    <link rel="stylesheet" href="view/resources/css/header.css">
    <link rel="stylesheet" href="view/resources/css/loginModalWindow.css">
    <link rel="stylesheet" href="view/resources/css/index.css">

    <!-- Constructors -->
    <link rel="stylesheet" href="view/resources/css/constructor.css">
    <link rel="stylesheet" href="view/resources/css/mini-constructor.css">

    <link rel="stylesheet" href="view/resources/css/leftModalWindow.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
      <?php include __DIR__.'/view/modalWindow.php'; ?>

      <?php include __DIR__.'/view/header.php';?>
      
      <main>
        <div class="container">

          <div class="main-wrapper">
            <!--  -->
            <h1>ДЕВОЧКА-СОСОЧКА, <br>СВЕЧКА ТЕБЕ!</h1>

            <div class="main-up-content">
              <div class="main-up-content left">
                  <span>
                    <a href="catalog.php" class="topAndSale">СВЕЧИ ПО АКЦИИ</a>
                  </span>
                  <div class="candles">
                      <?
                      require 'controller/php/connection.php';
                      $candles = mysqli_query($link, "SELECT `id` FROM `candles` WHERE `sale` = 1;");
                      if($candles)
                      {
                        $candles = mysqli_fetch_all($candles, MYSQLI_ASSOC);
                        foreach ($candles as $key => $value) {
                          ?>
                          <div class="candles__candle sale" data-candlenumber = '<?=$value['id'];?>'>
                            <a href="#" class="candle__src"></a>  
                          </div>
                          <?
                        }
                      }
                      ?>
                  </div>
              </div>

              <div class="main-up-content right">
                  <span><a href="catalog.php" class="topAndSale">ТОП СВЕЧКИ</a></span>
                  <div class="candles">
                    <?
                      $candles1 = mysqli_query($link, "SELECT `id` FROM `candles` WHERE `top` = 1;");
                      if($candles1)
                      {
                        $candles1 = mysqli_fetch_all($candles1, MYSQLI_ASSOC);
                        foreach ($candles1 as $key1 => $value1) {
                          ?>
                          <div class="candles__candle top" data-candlenumber = '<?=$value1['id'];?>'>
                            <a href="#" class="candle__src"></a>  
                          </div>
                          <?
                        }
                      }
                    ?>

                  </div>
              </div>
            </div>

            <div class="constructor-source">
              <h2><a style="color: #fff;" href="#outer-constructor-wrapper">СОЗДАЙ СВОЮ СВЕЧУ!</a></h2>

                <?include __DIR__ . '/view/mini-constructor.html'; ?>
              </a>

              
            </div>

          </div>

          <div class="outer-constructor-wrapper" id="outer-constructor-wrapper">
            <?include __DIR__ . '/view/constructor.php'; ?>
          </div>
          
        </div>
      </main>

      <footer>

        <span></span>

      </footer>
    </div>

    <script src="/controller/js/login-window.js" defer></script>
    <script src="/controller/js/leftModalWindow.js" defer></script>
    <script src="/controller/js/constructor.js" defer></script>
</body>
</html>