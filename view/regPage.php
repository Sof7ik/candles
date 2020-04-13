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

        <form method='POST' action='/controller/php/reg.php'>
            <input type='text' placeholder='Введите Логин' id='loginU' name='loginU' required autofocus><br>
            <input type='text' placeholder='Введите Имя' id='nameU' name='nameU' required><br>
            <input type='text' placeholder='Введите Фамилию' id='surnameU' name='surnameU' required><br>
            <input type='password' placeholder='Введите Пароль' id='passwordU' name='passwordU' required><br>
            <input type='password' placeholder='Повторно введите Пароль' id='repeatPasswordU' name='repeatPasswordU' required><br>
            <input type='email' placeholder='Введите Почту' id='emailU' name='emailU' required><br>
            <input type='tel' placeholder='Введите Телефон' id='telU' name='telU' required><br>
            <input type='submit' value='Отправить' id='button' name='button'>
        </form>

    </div>
   
    <script src="/controller/js/login-window.js"></script>
</body>
</html>