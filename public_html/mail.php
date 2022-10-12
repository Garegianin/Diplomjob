<?php


session_start();
if (isset($_SESSION['name'])) {
    require_once 'dbconn.php';
    $username=$_SESSION['name'];
    $email = trim($_POST["email"]);
    $tel = trim($_POST["tel"]);
    $allprice=$_SESSION['allprice'];
    $fullprice=$allprice+500;
    $dost = $_POST['dost'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $home = $_POST['home'];
    $homekv = $_POST['homekv'];
    $addressall = "Город: ".$city."; Улица: ".$street."; Дом/корп: ".$home."; квартира: ".$homekv.";";
    $yaq1=$conn->query("SELECT * FROM `orders`");
    $yaq = $yaq1->fetch_array();
    if(count($yaq) != 0) {
    $prodzak2=$conn->query("SELECT MAX(`idproductzak`) FROM `orders`");
    $prodzak1 = $prodzak2->fetch_array();
    $prodzak=max($prodzak1)+1;
    }
    else{
        $prodzak=1;
    }
    $result = $conn->query("Select * From `users` where `name` = '$username'");
    //$usname['idusers'];
    $usname2 = $result->fetch_array();
    $result2 = $conn->query("Select * From `basket` where `users_idusers` = '$usname2[idusers]'");
    $allprod='';
    $data=date('d.m.Y');
    while ($prod = mysqli_fetch_assoc($result2)) {
        $prodid=$prod['product_idproduct'];
        $result3 = $conn->query("Select * From `product` where `idproduct` = '$prodid'");
        $prodcol=$result3->fetch_array();
        $result1 = $conn->query("Select * From `basket` where `product_idproduct` = '$prodid' and `users_idusers` = '$usname2[idusers]'");
        $produt = $result1->fetch_array();
        $r1 = $produt[basketcol];
        $r2 = $prodcol[productcol];
        $r3=$r2-$r1;
        $allprod = $allprod." ". $prodcol['name']."; в количестве: ".$r1." шт.; ";
        $conn->query("DELETE FROM `basket` WHERE `product_idproduct` = '$prodid' and `users_idusers` = '$usname2[idusers]'");
        $conn->query("UPDATE `product` SET `productcol`='$r3' WHERE `idproduct` = '$prodid'");
    }
    $conn->query("INSERT INTO `orders` (`users_idusers` ,  `address` , `idproductzak` , `fullprice` , `vidopl` ,  `tel`,`allprod`,`data`,`done`) VALUES ('$usname2[idusers]','$addressall','$prodzak','$fullprice','$dost','$tel','$allprod','$data','не доставлен')");

}

//mail_____________________________________________________________________________
$to = $email;
$sitename = "Slime's Dungeon";
$from="z98561j7@slimesdungeon.ru";
$headers = 'From' .$from ."\r\n". 'Reply-To' .$from ."\r\n".'X-Mailer PHP/' . phpversion();
$name = $_POST["name"];

$message ="Имя: ".$name." \n Телефон: ".$tel." \n Номер заказа: ".$prodzak." \n Дата заказа: ".$data." \n В ваш заказ входит(дят):".$allprod." \n Итог: ".$fullprice."₽ \n Оплата: ".$dost. "\n \n В ближайшее время с вами свяжется менеджер для подтверждения заказа и времени доставки.";
$subject = "Ваш заказ с сайта '$sitename'";
mail($to, $subject, $message, $headers);
if(mail($to, $subject, $message, $headers) == true){
    echo '<script>';
    echo 'Отправилось на почту';
    echo '</script>';
}else{    echo '<script>';
    echo 'не отправилось на почту';
    echo '</script>';
}
echo '<script> document.location.href="shop.php"</script> ';