<?php

include "configs/db.php";

if (isset($_POST["login-email"]) && isset($_POST["login-password"])
        && $_POST["login-email"] != "" && $_POST["login-password"] != "") {

        $sql = "SELECT * FROM `users` WHERE `email` LIKE '" . $_POST["login-email"] . "' AND `password` LIKE '" . $_POST["login-password"] . "'";
        $result = mysqli_query($connect, $sql);
        $numbers_users = mysqli_num_rows($result);

        if ($numbers_users ==1) {
            $userLogin = mysqli_fetch_assoc($result);
            setcookie("user_id", $userLogin["id"], time() + 60*60);
        } else{
            echo "<h2>Логин или пароль введены не верно</h2>";
        }
    }
?>


<!---------- Модальное окно авторизации ---------->
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
    <div class='modal' id='log-in-modal'>
        <div class='close'><a href = "index.php">Главная</a></div>
            <div class='content'>
                <form action = "login.php" method = "POST">
                    <input type='text' name='login-email' placeholder='Введите имя пользователя'>
                    <input type='text' name='login-password' placeholder='Введите пароль'>
                    <button type = "submit">Войти</button>
                    <a href = "registration.php">
                        <h4>Регистрация</h4>
                    </a>    
                </form>
            </div>  
        </div>
    </div>
</body>