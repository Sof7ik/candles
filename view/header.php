<header style="position: fixed;">
    <nav>
        <a href="/index.php" class="nav-items">ГЛАВНАЯ</a>

        <a href="../index.php#outer-constructor-wrapper" class="nav-items">КОНСТРУКТОР</a>

        <a href="/view/catalog.php" class="nav-items">КАТАЛОГ </a>

        <a href="/view/userPage.php" class="nav-items">Личный кабинет</a>

        <div class="login-window">

            <button>Личный кабинет
                <img src="/view/resources/img/icons/user.png">
            </button>

            <div class="modal-window">
                <?php
                    if (!isset($_COOKIE['userInfo']))
                    {
                        ?>
                            <form method="POST" action="./controller/php/auth.php">
                                <input type="text" placeholder="Введите Почту/Телефон" id="loginAuthU" class="login-input" name="emailAuthU" required autofocus>
                                <input type="password" placeholder="Введите Пароль" id="passwordAuthU" class="login-input" name="passwordAuthU" required>
                                <div class='regAndLog'>
                                    <input type="submit" value="Войти" id="buttonAuth" name="buttonAuth">
                                    <a href="/view/regPage.php">Регистрация</a>
                                </div>
                            </form>
                        <?
                    }
                    else
                    {
                        ?>
                            <ul>
                                <li>Профиль</li>
                                <li>Заказы</li>
                            </ul>
                        <?
                    }
                ?>
                
            </div>

        </div>
    </nav>
</header>