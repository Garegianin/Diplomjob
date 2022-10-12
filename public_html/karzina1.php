<?php

session_start();
if (isset($_SESSION['name'])) {
    require_once 'dbconn.php';

    $prodid = $_POST['prodid'];
    $result = $conn->query("Select * From `product` where `idproduct` = '$prodid'");
    $prodcol = $result->fetch_array();
    $usname1 = $_POST['Sname'];
    $colp = $_POST['colp'];
    $result = $conn->query("Select * From `users` where `name` = '$usname1'");
    $usname2 = $result->fetch_array();
    $result1 = $conn->query("Select * From `basket` where `product_idproduct` = '$prodid' and `users_idusers` = '$usname2[idusers]'");
    $produt = $result1->fetch_array();
    $r1 = $produt[basketcol];
    $r2 = $prodcol[productcol];
    if (count($produt) != 0) {
        if($r2<=0){
            echo '<script>alert("Извините. Этого товара сейчас нет в наличии.")</script>';
            echo '<script> document.location.href="shop.php"</script> ';
        }
        elseif ($r1 >= $r2) {
            echo '<script>alert("Вы добавили в корзину весь товар(' . $produt[basketcol] . ')")</script>';
            echo '<script> document.location.href="shop.php"</script> ';
        } else {
            if($r1+$colp>=$r2){
                $sum = $r2;
                echo '<script>alert("Вы добавили в корзину весь товар(' . $r2 . ' шт.)")</script>';
            }else{
                $sum = $r1 + $colp;
            }
            $conn->query("UPDATE `basket` SET `basketcol`='$sum' WHERE `product_idproduct` = '$prodid' and `users_idusers` = '$usname2[idusers]'");
            echo '<script> document.location.href="shop.php"</script> ';
        }
    } else {
        $conn->query("INSERT INTO `basket` (`product_idproduct`,`users_idusers`,`basketcol`) VALUES ('$prodid','$usname2[idusers]','$colp')");
        echo '<script> document.location.href="shop.php"</script> ';
    }
} else {
        echo '<script charset="utf-8"> alert("Зарегистрируйтесь или войдите");</script> ';
    echo '<script> document.location.href="register.php"</script> ';
}

