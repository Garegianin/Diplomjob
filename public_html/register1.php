<?php

session_start();

if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])) {
require_once 'dbconn.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password . "qwerty123");


    $result1 = $conn->query("Select * From `users` where `name` = '$name'");
    $result2 = $conn->query("Select * From `users` where `email` = '$email'");
    $user1 = $result1->fetch_assoc();
    $user2 = $result2->fetch_assoc();
    if (count($user1) != 0) {
        echo '<script>';
        echo 'alert("Пользователь с таким Никнеймом уже существует")';
        echo '</script>';
        echo '<script> document.location.href="register.php"</script> ';
    } elseif (count($user2) != 0) {
        echo '<script>';
        echo 'alert("Пользователь с таким email уже существует")';
        echo '</script>';
        echo '<script> document.location.href="register.php"</script> ';
    } else {
        $conn->query("INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name','$email','$password')");
        echo '<script> document.location.href="login.php"</script> ';
    }
} else {
    echo '<script>';
    echo 'alert("Заполните все поля")';
    echo '</script>';
    echo '<script> document.location.href="register.php"</script> ';
}

