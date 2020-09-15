<?php
    //Запрос в БД
    $sql_users = "SELECT * FROM users";
    $result_users = mysqli_query($connect, $sql_users);
    $numbers_users = mysqli_num_rows($result_users);

    for ( $i = 0; $i < $numbers_users; $i++) {

        $user = mysqli_fetch_assoc($result_users);      //Получаем данные пользователя из БД
                        
        if (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] == $user["id"]) {
            continue;
        }
        echo "<li>";
            echo "<div class=\"avatar\">
                <img src=" . $user["photo"] . ">
            </div>";
            echo "<h3>" . $user["name"] . "</h3>";

            $sql = "SELECT * FROM friends WHERE user_1=" . $user["id"] . " AND user_2=" . $userId . "
                OR user_1=" . $userId . " AND user_2=" . $user["id"];
            $friendsResult = mysqli_query($connect, $sql);
            $numbersFriends = mysqli_num_rows($friendsResult);

            if ($numbersFriends > 0) {
                echo "<div data-link =\"http://chat.local/delete_friends.php?user_id=" . $user["id"] . "\" onclick = \"deleteFriend(this)\">Удалить из друзей</div>";
            } else{
                echo "<div data-link =\"http://chat.local/add_friends.php?user_id=" . $user["id"] . "\" onclick = \"addFriend(this)\">Добавить в друзья</div>";
            }
                            
            echo "</li>";
    }
?>