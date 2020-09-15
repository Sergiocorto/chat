<?php
    //функция получения пользователя из БД по нужному id
    function getUser ($id, $connect) {
        
        $sql_users = "SELECT * FROM users";
        $result_users = mysqli_query($connect, $sql_users);
        $numbers_users = mysqli_num_rows($result_users);
        
        for ($i=0; $i < $numbers_users; $i++) { 

            $user = mysqli_fetch_assoc($result_users);
            
            if ($id == $user["id"]) {
                return $user;
            }
        }
    }

?>