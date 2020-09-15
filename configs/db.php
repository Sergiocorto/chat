<?php 
// Файл для базы данных

//Переменные необходимые для работы с базой данных

$server = "localhost";
$username = "root";
$password = "";
$dbname = "chat_db";

// Подключаемся к базе данных

$connect = mysqli_connect($server, $username, $password, $dbname);

?>