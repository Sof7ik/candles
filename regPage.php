<?

if (isset($_COOKIE['userInfo']))
{
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <link rel="stylesheet" href="/view/resources/css/style.css">
    <link rel="stylesheet" href="/view/resources/css/registration.css">
    <link rel="stylesheet" href="/view/resources/css/header.css">
    <link rel="stylesheet" href="/view/resources/css/loginModalWindow.css">

    <link rel="stylesheet" href="/view/resources/css/index.css">

</head>
<body>

    <div class="wrapper">
        <?php include __DIR__ . '/view//header.php'; ?>

        <main>

            <div class="container">
                <div class="main-wrapper" style="min-height: 100vh;">
                    <div class="form-wrapper">

                        <span>РЕГИСТРАЦИЯ</span>

                        <form method='POST' action='' class="reg-form">
                            <input type='text' 
                            placeholder='Введите Имя' 
                            id='nameU' 
                            name='nameU'
                            class="reg-input"
                            required>

                            <input type='text' 
                            placeholder='Введите Фамилию' 
                            id='surnameU' 
                            name='surnameU'
                            class="reg-input"
                            required>

                            <div class="passwordWrapper" id="passwordWrapper-1">
                                <input type='password' 
                                placeholder='Введите Пароль' 
                                id='passwordU' 
                                name='passwordU'
                                class="reg-input-password"
                                required>
                                <a href="#" class="button"></a>
                            </div>

                            <div class="passwordWrapper" id="passwordWrapper-2">
                                <input type='password' 
                                placeholder='Повторно введите Пароль' 
                                id='repeatPasswordU' 
                                name='repeatPasswordU' 
                                class="reg-input-password"
                                required>
                                <a href="#" class="button"></a>
                            </div>

                            <input type='email' 
                            placeholder='Введите Почту' 
                            id='emailU' 
                            name='emailU'
                            class="reg-input"
                            required>

                            <input type='tel' 
                            placeholder='Введите Телефон'
                            id='telU' name='telU'
                            class="reg-input"
                            required>

                            <!-- <input type='submit' value='Отправить' id='button' name='button'> -->
                            <input type="button" id="button" value="Продолжить">
                        
                        </form>

                    </div>
                    
                </div>
            </div>
        </main>
    </div>
   
    <script src="controller/js/login-window.js"></script>
    <script src="controller/js/reg.js" defer></script>
    <script src="controller/js/regAJAX.js" defer></script>
</body>
</html>