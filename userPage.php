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

        <?php include __DIR__.'/view/header.php'; ?>

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
                                    if(isset($_COOKIE['userInfo']))
                                    {
                                        if (strlen(unserialize($_COOKIE['userInfo'])['name']) <= 0){
                                            echo "Имя не установлено";
                                        }
                                        else {
                                            echo unserialize($_COOKIE['userInfo'])['name'];
                                        }
                                    }
                                    else
                                    {
                                        echo "произошла ошибка с куками";
                                    }
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Фамилия</span>
                            <p id="surname">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->surname;
                                    if(isset($_COOKIE['userInfo']))
                                    {
                                        if (strlen(unserialize($_COOKIE['userInfo'])['surname']) <= 0){
                                            echo "Фамилия не установлена";
                                        }
                                        else {
                                            echo unserialize($_COOKIE['userInfo'])['surname'];
                                        }
                                    }
                                    else
                                    {
                                        echo "произошла ошибка с куками";
                                    }
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Почта</span>
                            <p id="email">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->email; 
                                    if(isset($_COOKIE['userInfo']))
                                    {
                                        if (strlen(unserialize($_COOKIE['userInfo'])['email']) <= 0){
                                            echo "Адрес электронной почты не установлен";
                                        }
                                        else {
                                            echo unserialize($_COOKIE['userInfo'])['email'];
                                        }
                                    }
                                    else
                                    {
                                        echo "произошла ошибка с куками";
                                    }
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Телефон</span>
                            <p id="phone">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->phone;
                                    if(isset($_COOKIE['userInfo']))
                                    {
                                        if (strlen(unserialize($_COOKIE['userInfo'])['phone']) <= 0){
                                            echo "Номер телефона не установлен";
                                        }
                                        else {
                                            echo unserialize($_COOKIE['userInfo'])['phone'];
                                        }
                                    }
                                    else
                                    {
                                        echo "произошла ошибка с куками";
                                    }
                                ?>
                            </p>
                        </li>
                        <li>
                            <span>Адрес</span>
                            <p id="address">
                                <?
                                    // echo json_decode($_COOKIE['userInfo'])->address;
                                    if (isset($_COOKIE['userInfo']))
                                    {
                                        if (strlen(unserialize($_COOKIE['userInfo'])['address']) <= 0)
                                        {
                                            echo "Адрес не выбран";
                                        }
                                        else {
                                            echo unserialize($_COOKIE['userInfo'])['address'];
                                        }
                                    }
                                    else 
                                    {
                                        echo "произошла ошибка с куками";
                                    }
                                    
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