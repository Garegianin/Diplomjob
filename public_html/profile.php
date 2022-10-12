<?php
session_start();
if (isset($_SESSION['name'])) {
    require_once 'dbconn.php';
    $name = $_SESSION['name'];
    $result = mysqli_query($conn, "Select * From `users` WHERE `name`= '$name'");
    $use = mysqli_fetch_assoc($result);
    $email = $use['email'];
    $_SESSION['email'] = $email;

} else {
    echo '<script> alert("Зарегистрируйтесь или войдите");</script> ';
    echo '<script> document.location.href="register.php"</script> ';
}
?>

<?php

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Slime's Dungeon</title>
    <!--// TODO добавление библиотеки-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <!--// TODO иконки-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js">

    <!--    <script src="index.js">-->

    <!--    </script>-->
</head>
<body class=" p-3 mx-auto flex-column" style="background-color: #e2eee2;">
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<header class="mb-4">
    <div class="container">

        <nav class="colorheader , navbar, navbar-light , fixed-top , justify-content-between , snipcart-summary ">
            <h5 class="mt-1">
                <a href="index.php"><img class="avatar3"
                                         src="https://sun9-88.userapi.com/s/v1/if2/aYEp1DOJPsSBlfPo0RKyDKhcjB5ft8f73sOYtz-T-DKAoEhNLXeSk6Eh8cKritXnXSmv-gkkGuRjPVt44YyrCd3p.jpg?size=59x50&quality=96&type=album"></a>
                <a href="index.php" class="colortitle" style="font-size: large">Slime's Dungeon </a> _
                <a class="mx-3" href="shop.php"><i class="fa fa-shopping-bag"></i></a>
                <a class="mx-3" href="profile.php"><i class="fa fa-user"> <?php print_r($_SESSION['name']); ?></i></a>

                <a class="colortitle" style="color: rgba(255, 255, 255, .5); margin-right: 1em; float: right;"
                   href="basket.php"> <i class="fa fa-shopping-cart" style="margin-right: 1em"></i> Корзина</a>
            </h5>
        </nav>
    </div>
</header>

<!---------------------------------------------------------------------------------------------------------------------------------------------->

<div class="container, mt-4">

    <div class="row">
        <div class="col" style="margin-left: 10em">
            <form action="exit1.php" id="exit1" method="post" name="exit1">
                <img class="avatar4 , mt-3 , mb-5"
                     src="https://thumbs.gfycat.com/OptimalKindheartedElk-size_restricted.gif">
                <h3 class="cover-heading , mb-5"> Имя: <?php print_r($_SESSION['name']); ?></h3>
                <h3 class="cover-heading , mb-5">Почта: <?php print_r($_SESSION['email']); ?></h3>
                <input type="submit" class="btn , btn-dark , border , border-secondary" id="bt1" name="bt1"
                       value=" Выход "></button>
            </form>
        </div>
        <div class="col , mt-3, container" style="margin-left: -10em">
                        <table>
                           <thead>
                            <tr class="border2">
                                <td class="border2">
                                    <h5 class="mb-3"> № Заказа</h5>
                                </td>
                                <td class="border2">
                                    <h5 class="mb-3"> Дата заказа</h5>
                                </td>
                                <td class="border2">
                                    <h5 class="mb-3"> Телефон при заказе</h5>
                                </td>
                                <td class="border2">
                                    <h5 class="mb-3 , center1"> Товар</h5>
                                </td>
                                <td class="border2">
                                    <h5 class="mb-3 , center1"> Оплата</h5>
                                </td>
                                <td class="border2">
                                    <h5 class="mb-3"> Итог(Цена)</h5>
                                </td>
                                <td class="border2">
                                    <h5 class="mb-3"> Выполнение заказа</h5>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once 'dbconn.php';
                            $username=$_SESSION['name'];
                            $result = $conn->query("Select * From `users` where `name` = '$username'");
                            //$usname['idusers'];
                            $usname2 = $result->fetch_array();
                            $result2 = $conn->query("Select * From `orders` where `users_idusers` = '$usname2[idusers]'");
//                            $dateord = $result2->fetch_array();
                            while($dateord = mysqli_fetch_assoc($result2)) {
                            echo    "<tr class='center1'>";
                            echo        "<td class='border2'>";
                            if($dateord['done']=='не доставлен'){
                                echo  "<div style='background-color: red'>";
                            }else{
                                echo  "<div style='background-color: greenyellow'>";
                            }

                            echo                "<h5 class='mb-3' style='color: black'> ".$dateord['idproductzak']."</h5>";

                                echo  "</div>";
                            echo        "</td>";
                            echo        "<td class='border2'>";
                            echo                "<h5 class='mb-3'> ".$dateord['data']."</h5>";
                            echo        "</td>";
                            echo        "<td class='border2'>";
                            echo                "<h5 class='mb-3'> ".$dateord['tel']."</h5>";
                            echo        "</td>";
                            echo        "<td class='border2'>";
                            echo                "<h5 class='mb-3'> ".$dateord['allprod']."</h5>";
                            echo        "</td>";
                            echo        "<td class='border2'>";
                            echo                "<h5 class='mb-3'> ".$dateord['vidopl']."</h5>";
                            echo        "</td>";
                            echo        "<td class='border2'>";
                            echo                "<h5 class='mb-3'> ".$dateord['fullprice']." ₽</h5>";
                            echo        "</td>";
                            echo        "<td class='border2'>";
                                if($dateord['done']=='не доставлен'){
                                    echo  "<div style='background-color: red'>";
                                }else{
                                    echo  "<div style='background-color: greenyellow'>";
                                }
                            echo                "<h5 class='mb-3' style='color: black'>".$dateord['done']."</h5>";
                                echo  "</div>";
                            echo        "</td>";
                            echo    "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
        </div>
    </div>

</div>
<br>
<br>
<br>
<br>
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