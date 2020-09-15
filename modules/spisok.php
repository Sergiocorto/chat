<ul>
    <?php
        if (!isset($sqlName)) {
            $sqlName = "SELECT * FROM `users`";
            $resultName = mysqli_query($connect, $sqlName);
            $numbers_usersName = mysqli_num_rows($resultName);
        }
        for ( $i = 0; $i < $numbers_usersName; $i++) {
            //получаем пользователя
            $user = mysqli_fetch_assoc($resultName);

            if (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] == $user["id"]) {
                continue;
            }

            echo "<li>";
                echo "<a href = index.php?user=" . $user["id"] . ">";
                    echo "<div class=\"avatar\">
                        <img src=" . $user["photo"] . ">
                    </div>";
                    echo "<h3>" . $user["name"] . "</h3>";
                    echo "<p> Hi </p>";
                    echo "<div class = \"time\">23:30</div>";
                echo "</a>";
            echo "</li>";
        }   
    ?>
</ul>