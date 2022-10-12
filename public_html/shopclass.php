<?php
session_start();
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
    <style>
        .zatemnenie {
            background: rgba(102, 102, 102, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }
        #okno {
            width: 1100px;
            height: 260px;
            text-align: center;
            padding: 15px;
            border: 3px solid #6d8f31;
            border-radius: 10px;
            color: #6d8f31;
            position: absolute;
            z-index: 1;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            background: #e2eee2;
        }
        .zatemnenie:target {display: block;}
        .close {
            display: inline-block;
            border: 1px solid #6d8f31;
            color: #6d8f31;
            padding: 0 12px;
            margin: 10px;
            text-decoration: none;
            font-size: 14pt;
            cursor:pointer;
        }

    </style>
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
<form class="center1 , mt-2 , mb-2">
    <form>
        <a class="btn , btn-dark , border disabled , , border-secondary" href="shopclass.php"> Классика</a>
        <a class="btn , btn-dark , border , border-secondary" href="shopcard.php"> Карточные</a> &nbsp | &nbsp
        <a class="btn , btn-dark , border ,  border-secondary" href="shop.php"> Сброс</a>
    </form>
</form>
</div>
<?php

?>
<br>

<div class="container" id="contik" name="contik">
    <?php
    require_once 'dbconn.php';

    $result = mysqli_query($conn, "Select * From `product` where `type`='classic'");
    $i = 0;
    $j = 0;
    while ($prod = mysqli_fetch_assoc($result)) {
        $img = $prod['image'];
        $name = $prod['name'];
        $price = $prod['price'];
        $productcol = $prod['productcol'];
        $description = $prod['description'];
        $idprod = $prod['idproduct'];       
        $i = $i + 1;
        $j=$j +1;
        if ($i = 1) {
            echo "<div class='row'>";
        }
        if ($i % 4) echo "<div class='row'>";
        if ($i % 2) echo "<div class='col'>";

        echo "<div class='main-block , border border-secondary border-3, mb-2' style='width: 1300px;'>";
        echo "<div class='row'>";
        echo "<div class='col'>";
        echo "<div class='image' style='margin-left: 2em'>";
        echo "&nbsp;<div class='m-1'><img style='height: 150px;' class=' border border-secondary , scale' alt='' src=" . $img . "></div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='col'>";
        echo "<div class='title'>";
        echo "<br><h2 style='margin-left: -4em'  ;>" . $name . "</h2> <br><br> ";
        echo "<div class='zatemnenie' id='zatemnenie1".$j."'>
                <div id='okno'>
                    " . $description. "<br> <a href='#'  class='close , btn , btn-dark , border , border-secondary'>Закрыть окно</a>
                </div>
                </div>
                <a class='btn , btn-dark , border , border-secondary' style='margin-left: -4em' href='#zatemnenie1".$j."'>Подробнее</a>";
        echo "</div>";
        echo "</div>";
        echo "<div class='col'>";
        echo "<form action='karzina1.php' id='productform' method='post' name='productform' class='productcol'>";
        if($productcol != 0){
            echo "<div class='col'>";
            echo "<br><br><h5> Есть в наличии <i class='fa fa-check-circle' aria-hidden='true'></i></h5> ";
            echo "</div>";
            echo "<div class='price'>";
            echo "<div><input hidden class='form-control' id='prodid' name='prodid' value='" . $idprod . "'></input></div>";
            echo "<div><input hidden class='form-control' id='Sname' name='Sname' value='" . $_SESSION['name'] . "'></input></div>";
            echo "<lable>Сколько хочешь добавить? <input style='width: 70px' class='form-control' type='number' max='" . $productcol . "' min='1'  id='colp' name='colp' value='1'> </input></lable>";
            echo "Добавить в корзину: <b><input type='submit' id='prodprice' name='prodprice' class='buttonComponent , btn , btn-dark , border , border-secondary' style='padding: 10px 25px;' value='" . $price . " ₽'></input></b> за 1 шт.";
            echo "</div>";
        }else{
            echo "<div class='col'>";
            echo "<br><br><h5> Нет в наличии <i class='fa fa-times' aria-hidden='true'></i></h5> ";
            echo "</div>";
            echo "<div class='price'>";
            echo "<div><input hidden class='form-control' id='prodid' name='prodid' value='" . $idprod . "'></input></div>";
            echo "<div><input hidden class='form-control' id='Sname' name='Sname' value='" . $_SESSION['name'] . "'></input></div>";
            echo "<lable>Сколько хочешь добавить? <input style='width: 70px' class='form-control , disabled' type='number' max='" . $productcol . "' min='1'  id='colp' name='colp' value='1'> </input></lable>";
            echo "Добавить в корзину: <b><input type='submit' id='prodprice' name='prodprice' class='buttonComponent , btn , disabled , btn-dark , border , border-secondary' style='padding: 10px 25px;' value='" . $price . " ₽'></input></b> за 1 шт.";
            echo "</div>";
        }
        echo "</form>";
        echo "</div>";
        echo "</div>";
        if ($i % 2) echo "</div>";
        if ($i % 4) echo "</div>";
        if ($i = 2) echo "</div>";
    }
    echo "<br><br>";
    ?>
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
<!--<script>-->
<!--    let bt1 = document.querySelector('.bt1');-->
<!--    let bt2 = document.querySelector('.bt2');-->
<!--    let bt3 = document.querySelector('.bt3');-->
<!--    let bt4 = document.querySelector('.bt4');-->
<!--    let bt5 = document.querySelector('.bt5');-->
<!---->
<!--    function z1() {-->
<!--        bt1.setAttribute('disabled', false);-->
<!--        bt2.removeAttribute('disabled');-->
<!---->
<!--    }-->
<!---->
<!--    function z2() {-->
<!--        bt2.setAttribute('disabled', false);-->
<!--        bt1.removeAttribute('disabled');-->
<!--    }-->
<!---->
<!--    function z3() {-->
<!--        bt3.setAttribute('disabled', false);-->
<!--        bt4.removeAttribute('disabled');-->
<!--    }-->
<!---->
<!--    function z4() {-->
<!--        bt4.setAttribute('disabled', false);-->
<!--        bt3.removeAttribute('disabled');-->
<!--    }-->
<!---->
<!--    function z5() {-->
<!--        bt1.removeAttribute('disabled');-->
<!--        bt2.removeAttribute('disabled');-->
<!--        bt3.removeAttribute('disabled');-->
<!--        bt4.removeAttribute('disabled');-->
<!--        bt5.removeAttribute('disabled');-->
<!---->
<!--    }-->
<!--</script>-->
</body>
</html>