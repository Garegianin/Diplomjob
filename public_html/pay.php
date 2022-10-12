<?php
session_start(); ?>
<?php
if (isset($_SESSION['name'])) {
    require_once 'dbconn.php';
    $name = $_SESSION['name'];
    $allprice = $_SESSION['allprice'];
    $result = mysqli_query($conn, "Select * From `users` WHERE `name`= '$name'");
    $use = mysqli_fetch_assoc($result);
    $email = $use['email'];
    $_SESSION['email'] = $email;

    $result = $conn->query("Select * From `users` where `name` = '$_SESSION[name]'");
    $result1 = mysqli_query($conn, "Select * From `basket` where `users_idusers` = '$use[idusers]'");
    $rowstr = $result1->fetch_array();
    if(count($rowstr) == 0){
        echo '<script> alert("Вы не добавили ни одного товара в корзину");</script>';
        echo '<script> document.location.href="shop.php"</script>';
    }


} else {
    echo '<script> alert("Зарегистрируйтесь или войдите");</script> ';
    echo '<script> document.location.href="register.php"</script> ';
}
?>
<?php


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
                <a class="mx-3" href="profile.php"><i class="fa fa-user"> <?php print_r($_SESSION['name']); ?></i></a>

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
<div class="container" style="width: 100%">
    <div>
        <br><h4><a style="color: #6d8f31 " href="basket.php"> <--- &nbsp Назад к корзине</a></h4>

    </div>
    <div class="auth-page expand" style="text-after: center; margin-left: auto; margin-right: auto;">
        <div class="card">
            <div class="card-header">
                <hr/>
                <h1>
                    <a style="text-align: center; margin-left: auto; margin-right: auto;" class="colortitle">Оформление заказа</a>
                </h1>
                <hr/>
                <form action="mail.php" id="pay" method="post" name="pay">
                    <div class="card-body">
                        <div class="form-group , mb-2">

                            Итого: <?php echo $_SESSION['fullfrice']=$allprice+500?>₽ (<?php echo $allprice ?>₽ +500₽ курьеру)
                        </div>
                        <div class="form-group , mb-2" id="result1">

                        </div>
                        <div class="form-group , mb-3">
                            <label>Имя&nbsp; </label><input id="name" name="name" value="<?php echo $name ?>" required="required">&nbsp;&nbsp;
                            <label>Email&nbsp; </label><input type="email" id="email" name="email" value="<?php echo $email ?>" required="required">&nbsp;&nbsp;
                            <label>Телефон&nbsp; </label><input id="tel" name="tel" pattern="+7[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" placeholder="+7**********" required="required">
                        </div>
                        <div class="form-group , mb-3">

                            <select name="dost" id="dost" required="required">
                                <option value="">Выберите вид оплаты</option>
                                <option value="Курьеру">Курьеру наличными</option>
                                <option value="По карте">Курьеру по карте</option>
                            </select>
                        </div>
                        <div class="form-group , mb-2">
                            Адрес
                        </div>
                        <div class="form-group , mb-3">

                            <input type="city" id="city" name="password" placeholder="Город" required="required">
                            <input id="street" name="street" placeholder="Улица" required="required">
                            <input id="home" name="home" placeholder="Дом, корпус" required="required">
                            <input id="homekv" name="homekv" placeholder="Квартира" required="required">
                        </div>
                        <div class="form-group , mb-1">

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="small" style="margin-left: auto; margin-right: auto;">
                            <input type="submit" class="btn , btn-dark , border , border-secondary" id="bt1" name="bt1" value=" Закончить оформление заказа"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

</script>
</body>
</html>