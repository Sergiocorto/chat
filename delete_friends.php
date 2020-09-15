<?php
    include "configs/db.php";
    include "configs/nastroyki.php";

    if (isset($_GET["user_id"])) {
        $sql = "DELETE FROM friends WHERE `friends`.`user_1` =" . $userId . " AND `friends`.`user_2` =" . $_GET["user_id"];
        if (mysqli_query($connect, $sql)) {
            include "modules/friend_list.php";
        } else {
            echo "<h2>ERROR</h2>";
        }
    }

?>