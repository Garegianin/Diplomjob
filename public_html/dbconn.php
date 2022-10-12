<?php
$servername1 = "localhost";
$database1 = "z98561j7_shop";
$username1 = "z98561j7_shop";
$password1 = "Root123";

$conn = mysqli_connect($servername1, $username1, $password1, $database1);
mysqli_set_charset($conn , "utf-8");
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}