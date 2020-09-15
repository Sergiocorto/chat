<?php
include "configs/db.php";

if (isset($_POST['name']) && isset($_POST["email"]) && isset($_POST["password"])
    && $_POST["name"] != "" && $_POST["email"] != "" && $_POST["password"] != "") {

    $sql = "INSERT INTO users (name, email, password) VALUES ('" . $_POST['name'] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "')";

    if (mysqli_query($connect, $sql)) {
        echo "<h2>Пользователь добавлен</h2>";
    } else {
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
    
    <div class='modal' id='registration-modal'>
        <div class='close'>X</div>
        <div class='content'>
            <form action = "registration.php" method = "POST">
                <input type='text' name='name' placeholder='Введите имя пользователя'>
                <input type='text' name='email' placeholder='Введите e-mail'>
                <input type='text' name='password' placeholder='Введите пароль'>
                <button>Зарегистрироватся</button>
                <a href = "index.php">Назад</a>
            </form>
        </div>  
    </div>
</body>