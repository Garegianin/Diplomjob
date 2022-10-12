<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Slime's Dungeon</title>
    <!--// TODO добавление библиотеки-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <!--// TODO иконки-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <!--<link rel="stylesheet" href="/stylesheets/site.css">-->
    <link rel="stylesheet" type="text/css" href="style.css">
    src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
    <script></script>
</head>
<body class=" p-3 mx-auto flex-column" style="background-color: #e2eee2;">
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<header>
    <div class="container">

        <nav class="colorheader , navbar, navbar-light , fixed-top , justify-content-between , snipcart-summary ">
            <h5 class="mt-1">
                <a href="index.php"><img
                            src="https://sun9-88.userapi.com/s/v1/if2/aYEp1DOJPsSBlfPo0RKyDKhcjB5ft8f73sOYtz-T-DKAoEhNLXeSk6Eh8cKritXnXSmv-gkkGuRjPVt44YyrCd3p.jpg?size=59x50&quality=96&type=album"
                            class="avatar3"></a>
                <a href="index.php" class="colortitle" style="font-size: large">Slime's Dungeon </a> _
                <a class="mx-3" href="shop.php"><i class="fa fa-shopping-bag"></i></a>
                <a class="mx-3" href="profile.php"><i class="fa fa-user"> </i></a>

                <a style="color: rgba(255, 255, 255, .5); margin-right: 1em; float: right;"><s class="colortitle"> <i
                                class="fa fa-shopping-cart" style="margin-right: 1em"></i> Корзина</s></a>
            </h5>
        </nav>
    </div>
</header>

<footer class="mastfoot" style="position: absolute">
    <h6 class="mt-2" style="margin-top: -2em">
        <div>
            <a href="https://web.telegram.org" target="_blank"> <i class="fab fa-telegram"> </i></a>&nbsp;&nbsp;|&nbsp;
            <a href="https://vk.com" target="_blank"> <i class="fab fa-vk"> </i></a>&nbsp;&nbsp;|&nbsp;
            <a href="https://mail.google.com" target="_blank"><i class="fa fa-envelope"></i></a>
        </div>
        ©2022 Slime's Dungeon
    </h6>
</footer>
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<div style="text-align: center; margin-left: auto; margin-right: auto; ">
    <h1>
        <a href="index.php" class="colortitle"><br>Slime's Dungeon</a>
    </h1>
</div>

<div class="mb-2 " style="margin-left: auto; margin-right: auto;">
    <button class="buttonComponent , btn , btn-dark , border , border-secondary" style="padding: 10px 25px;"><a
                class="colortitle" href="register.php"><b>Регистрация</b></a></button>
    <button class="buttonComponent , disabled  , btn , btn-dark , border , border-secondary"
            style="padding: 10px 25px;"><b>Вход</b></button>
</div>


<div class="auth-page expand" style="text-after: center; margin-left: auto; margin-right: auto;">
    <div class="card">
        <div class="card-header">
            <hr/>
            <h1>Вход</h1>
            <hr/>
            <form action="login1.php" id="login" method="post" name="loginform">
                <div class="card-body">
                    <div class="form-group">

                        <input class="form-control" type="name" id="name" name="name" placeholder="Никнейм" required="required">
                    </div>
                    <div class="form-group">

                        <input class="form-control" type="password" id="password" name="password" placeholder="Пароль" required="required">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="small" style="margin-left: auto; margin-right: auto;">
                        <input type="submit" class="btn , btn-dark , border , border-secondary" id="bt1" name="bt1"
                               value=" Вход "></input>
                    </div>
                </div>
                <!--onclick="signup3('password','email')"-->
            </form>
        </div>
    </div>
</div>
<script>

</script>
</body>
</html>