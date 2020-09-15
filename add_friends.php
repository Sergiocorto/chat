<?php
    include "configs/db.php";
    include "configs/nastroyki.php";

    if (isset($_GET["user_id"])) {
        
        $sql = "INSERT INTO friends (user_1, user_2) VALUES ('" . $userId . "' , '" . $_GET["user_id"] . "')";
        if (mysqli_query($connect, $sql)) {
            include "modules/friend_list.php";
        } else {
            echo "<h2>ERROR</h2>";
        }
    }
    

?>