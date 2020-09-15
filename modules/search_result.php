<?php
    include "../configs/db.php";

    //Перебираем пользователей
$sqlName = "SELECT * FROM `users` WHERE `name` LIKE '" . $_POST["search"] . "'";
$resultName = mysqli_query($connect, $sqlName);
$numbers_usersName = mysqli_num_rows($resultName);
if ($numbers_usersName == 0) {
    echo "<h3>Совпадений не найдено</h3>";
}

include "spisok.php";
?>