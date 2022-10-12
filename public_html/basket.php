<?php
session_start();
?>

<?php
if (isset($_SESSION['name'])) {
    require_once 'dbconn.php';
    $name = $_SESSION['name'];
    $result = mysqli_query($conn, "Select * From `users` WHERE `name`= '$name'");
    $use = mysqli_fetch_assoc($result);
    $email = $use['email'];
    $_SESSION['email'] = $email;
    $_SESSION['allprice'] = 0;

} else {
    echo '<script> alert("Зарегистрируйтесь или войдите");</script> ';
    echo '<script> document.location.href="register.php"</script> ';
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">
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
                <a class="mx-3" href="profile.php"><i class="fa fa-user">  <?php print_r($_SESSION['name']); ?></i></a>

                <a style="color: rgba(255, 255, 255, .5); margin-right: 1em; float: right;"><s class="colortitle"> <i
                                class="fa fa-shopping-cart" style="margin-right: 1em"></i> Корзина</s></a>
            </h5>
        </nav>
    </div>
</header>

<!----------------------------------------------------------------------------------------------------------------------------->

<div class="container" style="width: 100%">
    <div>
        <br><h4><a style="color: #6d8f31 " href="shop.php"> <--- &nbsp Назад к товарам</a></h4>

    </div>

    <div class="auth-page expand" style="text-after: center; margin-left: auto; margin-right: auto;">
        <div class="card , mb-2">

            <div class="card-header">
                <hr/>
                <h1>
                    <a style="text-align: center; margin-left: auto; margin-right: auto;" class="colortitle">Корзина</a>
                </h1>
                <hr/>
                <div class="card-body">
                    <?php
                    require_once 'dbconn.php';

                    $result = $conn->query("Select * From `users` where `name` = '$_SESSION[name]'");
                    $usname2 = $result->fetch_array();
                    $result1 = mysqli_query($conn, "Select * From `basket` where `users_idusers` = '$usname2[idusers]'");
                    $allprice=0;
                    $allcol=0;
                    while ($prod1 = mysqli_fetch_assoc($result1)) {
                        $idp = $prod1['product_idproduct'];
                        //echo '<script> alert("idp= "+ '.$idp.');</script> ';
                        $result = mysqli_query($conn, "Select * From `product` where `idproduct` = '$idp'");
                        $prod = mysqli_fetch_assoc($result);
                        $name = $prod['name'];
                        $price = $prod['price'];
                        $productcol = $prod['productcol'];
                        $basketcol = $prod1['basketcol'];
                        $idprod = $prod['idproduct'];

                        echo "<div class='main-block , mb-2 , mt-2' style='width: 800px;'>";
                        echo "<div class='row , border border-secondary border-3'>";
                        echo "<div class='col'>";
                        echo "<div class='title'>";
                        echo "<br><u><h3 style='margin-left: 2em;'>" . $name . "</h3></u> ";
                        echo "<br><h6>&nbsp;&nbsp;Вы добавили: " . $basketcol. " шт.</h6> ";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='col'>";
                        echo "<div class='col'>";
                        echo "</div>";
                        echo "<div class='price'>";
                        echo "<form action='del1.php' id='del0' method='post' name='del0' class='productcol'>";
                        echo "<div><input hidden class='form-control' id='prodid' name='prodid' value='" . $idprod . "'></input></div>";
                        echo "<div><input hidden class='form-control' id='Sname' name='Sname' value='" . $_SESSION['name'] . "'></input></div>";
                        echo "<div class='col'>";
                        echo "<br><h6 class='mt-2'> Цена за это: " . $basketcol*$price . "₽.</h6> ";
                        $allprice+=$basketcol*$price;
                        $allcol+=$basketcol;
                        echo "</div>";
                        echo "<div class='col'>";
                        echo "<input type='submit' id='del1' name='del1' class='buttonComponent , btn , btn-dark , border , border-secondary'  value='Удалить'></input>";
                        echo "</div>";
                        echo "</form>";
                        echo "<b hidden><input type='submit' id='prodprice' name='prodprice' class='buttonComponent , btn , btn-dark , border , border-secondary' style='padding: 10px 25px;' value='" . $price . "'></input></b>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='col'>";
                        echo "<div class='description'>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                        <div class="card-footer">
                            <div class="row" style="margin-left: auto; margin-right: auto;">
                                <div class="col">
                                    <h5>Общее количество: <?php echo $allcol;?> шт.</h5>
                                    <h4>Итого: <?php echo $allprice;?>₽</h4>
                                    <?php $_SESSION['allprice'] = $allprice; ?>

                                </div>
                                <div class="col">
                                    <br><button class="btn , btn-dark , border , border-secondary" id="bt1" name="bt1" ><a href="pay.php">Оформить заказ</a></button>
                                </div>
                            </div>
                        </div>
                    <!--onclick="signup3('password','email')"-->
                </div>
            </div>
        </div>
    </div>
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
