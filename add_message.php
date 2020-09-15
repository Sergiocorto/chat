<?php
include "configs/db.php";
include "modules/get_user.php";

if (isset($_POST['text']) && isset($_POST["user_id_1"]) && isset($_POST["user_id_2"])
    && $_POST["text"] != "" && $_POST["user_id_1"] != "" && $_POST["user_id_2"] != "") {
    //Добавленине сообщения в БД
    $sql = "INSERT INTO messages (text, user_id_1, user_id_2) VALUES ('" . $_POST["text"] . "', '" . $_POST["user_id_1"] . "', '" . $_POST["user_id_2"] . "')";

    if ( !mysqli_query($connect, $sql) ) {
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    }
}

$send_user_id = $_POST["user_id_2"];

include "modules/perepiska.php";
?>