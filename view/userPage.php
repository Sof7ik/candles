<?
if (!isset($_COOKIE['userInfo']))
{
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userPage</title>
    <link rel="stylesheet" href="/view/resources/css/userPage.css">
    <link rel="stylesheet" href="/view/resources/css/header.css">

    <link rel="stylesheet" href="/view/resources/css/loginModalWindow.css">
    <link rel="stylesheet" href="/view/resources/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.html'; ?>
        <div class="main-wrapper">
            <div class="container">
                <div class='info'>
                    <div class='photo'>
                        <img src='/view/resources/img/pics/1.png'>
                    </div>
                    <ul class='infoAboutUser'>
                        <li>
                            <span>Имя</span>
                            <p>123</p>
                        </li>
                        <li>
                            <span>Фамилия</span>
                            <p>123</p>
                        </li>
                        <li>
                            <span>Почта</span>
                            <p>123@123</p>
                        </li>
                        <li>
                            <span>Телефон</span>
                            <p>+123456789</p>
                        </li>
                        <li>
                            <span>Адрес</span>
                            <p>123</p>
                        </li>
                    </ul>
                </div>
            </div>
            

        </div>

    </div>
    <script src='/controller/js/login-window.js'></script>
</body>
</html>