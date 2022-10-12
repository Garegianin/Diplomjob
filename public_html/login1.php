<?php
session_start();

if (!empty($_POST['name']) && !empty($_POST['password'])) {
    /* Получение количества строк в наборе результатов */
    $name = $_POST['name'];
    $password = $_POST['password'];

    require_once 'dbconn.php';
    $password = md5($password . "qwerty123");
    $result = $conn->query("Select * From `users` where `name` = '$name' and `password`='$password'");
    $user = $result->fetch_assoc();
    if (count($user) == 0) {
        echo '<script> alert("Такой пользователь с паролем не найдены в базе данных.");</script> ';
        echo '<script> document.location.href="login.php"</script> ';

    } else {
        $_SESSION['name'] = $name;
        echo '<script> document.location.href="profile.php"</script> ';

    }
} else {
    echo '<script> alert("Заполните все поля");</script> ';
    echo '<script> document.location.href="login.php"</script> ';

}

