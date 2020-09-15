<?php  
include "configs/nastroyki.php";
include "configs/db.php";
include "modules/get_user.php";

if($userId == null){
    header("Location: /login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Chat</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
    
    <?php

    // Модальное окно инфо о пользователе
        if (isset($_GET["user"])) {

            $userId = $_GET["user"];
            $user = getUser($userId, $connect);
            ?>

            <div class='modal' style = 'display: block;'>
                <div class='close'>X</div>
                <div class='content'>
                    <h3>Пользователь: <?php echo $user["name"] ?></h3>
                    <h3>Номер: <?php echo $user["id"] ?></h3>
                    <h3>E-mail: <?php echo $user["email"] ?></h3>
                    <h3>Телефон: <?php echo $user["phone"] ?></h3>
                        
                </div>    
            </div>

            <?php
        }

        ?>
    
      

    <!---------- Шапка чата---------->
    <div id = 'heat'>

        <!---------- Логотип----------> 

        <div id = 'logo'>
            <a href = "index.php">
                <img src = 'images\logo.png'><span><b>Web</b><i>CHAT</i></span>
            </a>
        </div>

        <!---------- Блок меню---------->

        <div id = 'menu'>

            <a href='#' id='contacts-btn'>Контакты</a>
            <a href='#'>Настройки</a>
            <?php
                if (isset($_COOKIE["user_id"])) {
                    echo "<a href='exit.php' id='log-in-btn'>Выйти</a>";
                } else {
                    echo "<a href='login.php' id='log-in-btn'>Войти</a>";
                }
            ?>

        </div>

    </div>

    <div id = 'content'>

        <!---------- Блок пользователей---------->

        <div id='users'>
            <form id='search' action = "http://chat.local/modules/search_result.php" method = "POST" >

                <input type='text' name="search" placeholder='Введите имя пользователя'>
                
                <button type = "submit">
                    <img src = 'images/searh_icon.png'>
                </button>
            </form>
            <div id='usersList'>
                <?php
                    include "modules/spisok.php";
                ?>
            </div>

        </div>

        <!---------- Блок переписки---------->

        <div id='messages'>
            <div id='messages-feed'>
                <?php
                    include "modules/perepiska.php";
                ?>
            </div>  

            <!---------- Блок формы ввода сообщения---------->
            <?php
            if (isset($_GET["user"])){
                echo "<form id=\"form\" action = \"http://chat.local/add_message.php\" method = \"POST\">";
                    echo "<input type = \"hidden\" name = \"user_id_1\" value =" . $_COOKIE['user_id'] . ">";
                    echo "<input type = \"hidden\" name = \"user_id_2\" value =" . $_GET['user'] . ">";
                    echo "<textarea name = \"text\"></textarea>";
                    echo "<button type = \"submit\" name=\"send_sms\">";
                        echo "<img src='images\send.png'>";
                    echo "</button>";
                echo "</form>";
            }
            ?>
        </div>
    </div>
    <!---------- Модальное окно контактов ---------->

    <?php
        include "modules/contacts.php";
    ?>

    <script src="script.js"></script>
</body>
</html>