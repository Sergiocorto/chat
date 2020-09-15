<?php
    echo "<ul>";
        //Запрос в БД
        $sql_messages = "SELECT * FROM messages";
        $result_messages = mysqli_query($connect, $sql_messages);
        $numbers_messages = mysqli_num_rows($result_messages);

        //Проверяем есть ли в запросе пользователь
        if (isset($_GET["user"]) || isset($send_user_id)) {

            $user_id = null;

            if (isset($_GET["user"])) {
                $user_id = $_GET["user"];
            }else{
                $user_id = $send_user_id;
            }
            //перебираем вообщеия из БД
            for ( $i = 0; $i < $numbers_messages; $i++) {
                //Получаем сообщение из БД
                $message = mysqli_fetch_assoc($result_messages);
                //Проверяем совпадают ли id пользователей в сообщении с id в запросе
                if ($message["user_id_1"] == $user_id || $message["user_id_2"] == $user_id) {
                    //Получаем пользователя из БД
                    
                    $user = getUser($message["user_id_1"], $connect);
                    //Выводим на экран сообщение
                    echo "<li>";
                        echo "<div class=\"avatar\">";
                            echo "<a href = index.php?user=" . $user["id"] . ">";
                                echo "<img src=" . $user["photo"] . ">";
                            echo "</a>";
                        echo "</div>";
                        echo "<h3>" . $user["name"] . "</h3>";
                        echo "<p>" . $message["text"] . "</p>";
                        echo "<div class = \"time\">" . $message["time"] . "</div>";
                    echo "</li>";
                }
            }    
        }
        //Проверяем есть ли в запросе данные из поиска
        if (isset($_GET["search"])) {
            //перебираем вообщеия из БД
            for ( $i = 0; $i < $numbers_messages; $i++) {
                //Получаем сообщение и пользователя из БД
                $message = mysqli_fetch_assoc($result_messages);
                $user = getUser($message["user_id_1"], $connect);
                // если в тексте сообщения есть текст из поиска, выводим его на экран
                if ( stristr($message["text"], $_GET["search"]) ) {
                    echo "<li>";
                        echo "<div class=\"avatar\">";
                            echo "<a href = index.php?user=" . $user["id"] . ">";
                                echo "<img src=" . $user["photo"] . ">";
                            echo "</a>";
                        echo "</div>";
                        echo "<h3>" . $user["name"] . "</h3>";
                        echo "<p>" . $message["text"] . "</p>";
                        echo "<div class = \"time\">" . $message["time"] . "</div>";
                    echo "</li>";
                }
            }
        }
    echo "</ul>";
?>