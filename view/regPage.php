<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <link rel="stylesheet" href="/view/resources/css/style.css">
    <link rel="stylesheet" href="/view/resources/css/registration.css">
    <link rel="stylesheet" href="/view/resources/css/loginModalWindow.css">
    <link rel="stylesheet" href="/view/resources/css/header.css">
</head>
<body>
    <?php include './header.html'; ?>

    <div class="wrapper">

        <main>

            <div class="container">
                <div class="form-wrapper" style="min-height: 100vh;">

                    <h1>РЕГИСТРАЦИЯ</h1>

                    <form method='POST' action='/controller/php/reg.php'>
                        <input type='text' 
                        laceholder='Введите Имя' 
                        id='nameU' 
                        name='nameU'
                        required>

                        <input type='text' 
                        placeholder='Введите Фамилию' 
                        id='surnameU' 
                        name='surnameU' 
                        required>

                        <input type='password' 
                        placeholder='Введите Пароль' 
                        id='passwordU' 
                        name='passwordU' 
                        required>

                        <input type='password' 
                        placeholder='Повторно введите Пароль' 
                        id='repeatPasswordU' 
                        name='repeatPasswordU' 
                        required>

                        <input type='email' 
                        placeholder='Введите Почту' 
                        id='emailU' 
                        name='emailU' 
                        required>

                        <input type='tel' 
                        placeholder='Введите Телефон'
                        id='telU' name='telU' 
                        required>

                        <input type='submit' value='Отправить' id='button' name='button'>
                    </form>
                </div>
            </div>
        </main>
    </div>
   
    <script src="/controller/js/login-window.js"></script>
</body>
</html>