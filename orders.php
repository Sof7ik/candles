<?php
require 'controller/php/connection.php';

if (!isset($_COOKIE['userInfo']))
{
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>заказы</title>

    <link rel="stylesheet" href="view/resources/css/style.css">
    <link rel="stylesheet" href="view/resources/css/header.css">
    <link rel="stylesheet" href="view/resources/css/loginModalWindow.css">
    <link rel="stylesheet" href="view/resources/css/orders.css">
    
</head>
<body>
    <div class="wrapper">

    <?include __DIR__.'\view\header.php';?>

    <main>
        <div class="container">
            <div class="main-wrapper">
                <span>Все Ваши Заказы</span>

                <div class="grid-container">
                    <?php require __DIR__ . '/controller/php/select_orders.php'; ?>
                </div>
            </div>
        </div>
    </main>

    <script src="controller/js/login-window.js"></script>
</body>
</html>

<?php



?>