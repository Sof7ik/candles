<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аромасвечи</title>

    <link rel="stylesheet" href="./view/resources/css/style.css">
    <link rel="stylesheet" href="./view/resources/css/header.css">
    <link rel="stylesheet" href="./view/resources/css/loginModalWindow.css">
    <link rel="stylesheet" href="./view/resources/css/index.css">
    <link rel="stylesheet" href="./view/resources/css/constructor.css">
    <link rel="stylesheet" href="./view/resources/css/leftModalWindow.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
      <?php include './model/modalWindow.html'?>
      <header>
          <nav>
              <a href="#" class="nav-items">ГЛАВНАЯ</a>
              <a href="#inner-constructor-wrapper" class="nav-items">КОНСТРУКТОР</a>
              <a href="./view/resources/catalog.php" class="nav-items">КАТАЛОГ </a>
              <a href="#" class="nav-items">СТРАНИЦА</a>
              <div class="login-window">
                <button>Личный кабинет
                  <img src="./view/resources/img/icons/user.png">
                </button>
                <div class="modal-window">
                  <form method="POST" action="./controller/php/auth.php">
                    <input type="text" placeholder="Введите Логин" id="loginAuthU" class="login-input" name="loginAuthU" required autofocus>
                    <input type="password" placeholder="Введите Пароль" id="passwordAuthU" class="login-input" name="passwordAuthU" required>
                    <div class='regAndLog'>
                      <input type="submit" value="Войти" id="buttonAuth" name="buttonAuth">
                      <a href="./view/resources/regPage.php">Регистрация</a>
                    </div>
                  </form>
                </div>
              </div>
          </nav>
          
      </header>
      
      <main>
        <div class="container">

          <div class="main-wrapper">
            <h1>ДЕВОЧКА-СОСОЧКА, <br>СВЕЧКА ТЕБЕ!</h1>

            <div class="main-up-content">
              <div class="main-up-content left">
                  <a href="./view/resources/catalog.php" class="topAndSale">СВЕЧИ ПО АКЦИИ</a>
                  <div class="candles">
                      <div class="candles__candle sale">
                        <a href="#" class="candle__src"></a>  
                      </div>

                      <div class="candles__candle sale">
                        <a href="#" class="candle__src"></a>  
                      </div>

                      <div class="candles__candle sale">
                        <a href="#" class="candle__src"></a>  
                      </div>

                      <div class="candles__candle sale">
                        <a href="#" class="candle__src"></a>  
                      </div>
                  </div>
              </div>

              <div class="main-up-content right">
                  <a href="./view/resources/catalog.php" class="topAndSale">ТОП СВЕЧКИ</a>
                  <div class="candles">
                      <div class="candles__candle top">
                        <a href="#" class="candle__src"></a>  
                      </div>

                      <div class="candles__candle top">
                        <a href="#" class="candle__src"></a>  
                      </div>

                      <div class="candles__candle top">
                        <a href="#" class="candle__src"></a>  
                      </div>

                      <div class="candles__candle top">
                        <a href="#" class="candle__src"></a>  
                      </div>
                  </div>
              </div>
            </div>

            <div class="constructor-source">
              <h2>СОЗДАЙ СВОЮ СВЕЧУ!</h2>

              <?include './model/constructor.html'?>
            </div>

          </div>

          <?include './model/constructor.html'?>

        </div>
      </main>

      <footer>

        <span></span>

      </footer>
    </div>
    <script src="./controller/js/main.js"></script>
</body>
</html>