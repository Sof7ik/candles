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
        <?php include 'header.php'; ?>
        <div class="main-wrapper">
            <div class="container">
                <div class='info'>
                    <div class="sub-nav">
                        <button class="edit-prof">Изменить</button>
                    </div>
                    <!-- <div class='photo'>
                        <img src='/view/resources/img/pics/1.png'>
                    </div> -->
                    <ul class='infoAboutUser'>
                        <li>
                            <span>Имя</span>
                            <p id="name"> 
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->name;
                                    echo unserialize($_COOKIE['userInfo'])['name'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Фамилия</span>
                            <p id="surname">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->surname;
                                    echo unserialize($_COOKIE['userInfo'])['surname'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Почта</span>
                            <p id="email">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->email; 
                                    echo unserialize($_COOKIE['userInfo'])['email'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Телефон</span>
                            <p id="phone">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->phone;
                                    echo unserialize($_COOKIE['userInfo'])['phone'];
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Адрес</span>
                            <p id="address">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->address;
                                    echo unserialize($_COOKIE['userInfo'])['address'];
                                ?>
                            </p>
                        </li>
                    </ul>
                </div>
                
                
            </div>
            

        </div>

    </div>
    <script src='/controller/js/login-window.js'></script>
    <!-- <script src="/controller/js/userPage.js" defer></script> -->
</body>
</html>