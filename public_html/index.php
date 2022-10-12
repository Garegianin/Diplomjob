<?php session_start(); ?>
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
                <?php
                if (isset($_SESSION['name'])) {
                echo'<a class="mx-3" href="profile.php"><i class="fa fa-user"> '. ($_SESSION['name']). '</i></a>';
                } else {
                echo'<a class="mx-3" href="profile.php"><i class="fa fa-user"></i></a>';
                }
                ?>

                <a class="colortitle" style="color: rgba(255, 255, 255, .5); margin-right: 1em; float: right;"
                   href="basket.php"> <i class="fa fa-shopping-cart" style="margin-right: 1em"></i> Корзина</a>
            </h5>
        </nav>
    </div>
</header>

<!----------------------------------------------------------------------------------------------------------------------------->


<div class="center1">
    <h1><a href="index.php" class="colortitle">Slime's Dungeon</a></h1>
    <img class="avatar2 , mt-3 , mb-5" src="https://i.pinimg.com/736x/a3/b3/b5/a3b3b540bd1d08284686ce6e5b9a63db.jpg">
    <p class="mb-3 , lead"> Заходи к нам и добро пожаловать!</p>
    <p class="mb-5">
        <a class="btn , btn-dark , border , border-secondary" href="shop.php"> Товары</a>
    </p>
    <div class="mb-5">
        <img class="w-50"
             src="https://sun9-54.userapi.com/s/v1/if2/iV6yMI3pBTEV7xryWht8amDGVec-dLcxy1W6sFsq_S4tQPUxzemSynJxiJyiWmkMgvPZU-FYZSEoreQYntUPMGNa.jpg?size=1892x803&quality=96&type=album">
    </div>
    <div class="mb-5 , cover-container , center1"
         style="color: #6d8f31; margin-right: auto; margin-left: auto; outline: 2px solid #000;">
        <p class="lead , mb-5">
        <table class="center1 , border2">
            <thead>
            <tr>
                <th>
                    <h3 class="mb-3" style="outline: 2px solid #000;"> О НАС</h3>
                </th>
            </tr>
            </thead>
            <tbody style="text-align: justify; text-indent: 20px;">
            <tr>
                <td>
                    <p>
                        В век IT-технологий и жизни в обнимку с роботами, в век пандемий и извращенных локдаунов мы
                        лишены социализации, живого общения с друг другом, мы лишены живого смеха и ярких эмоций. Мы
                        живем в другой век и должны подстраиваться под него, но живое общение исключать нельзя ни в коем
                        случае. Наша компания "Slime's Dungeon" долго искала, разрабатывала, проводила опросы, велись
                        переговоры с различными специалистами. Мы грамотно продумали как, хотя бы на время, заменить
                        онлайн на офлайн общение с тем же азартом, но без потери себя, как несоциализированной личности.
                    </p>
                    <p class="mb-5">
                        Решение этой жесткой проблемы - найдено! Пора вытащить нас из рабства компьютерных изоляторов!!!
                        "Slime's Dungeon" предоставляет эту возможность в виде качественных, интересных, развивающих,
                        азартных и увлекательных настольных игр. А тем, кому нескем играть или вообще не умеет, наши
                        сотрудники всегда с радостью помогут.
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
        </p>
    </div>
</div>
<footer class="mastfoot">
    <h6 class="mt-2" style="margin-top: -2em">
        <div>
            <a href="https://web.telegram.org" target="_blank"> <i class="fab fa-telegram"> </i></a>&nbsp;&nbsp;|&nbsp;
            <a href="https://vk.com" target="_blank"> <i class="fab fa-vk"> </i></a>&nbsp;&nbsp;|&nbsp;
            <a href="https://mail.google.com" target="_blank"><i class="fa fa-envelope"></i></a>
        </div>
        ©2022 Slime's Dungeon
    </h6>
</footer>
</body>
</html>