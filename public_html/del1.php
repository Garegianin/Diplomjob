<?php

session_start();
require_once 'dbconn.php';

$prodid = $_POST['prodid'];
$result = $conn->query("Select * From `product` where `idproduct` = '$prodid'");
$prodcol = $result->fetch_array();
$usname1 = $_POST['Sname'];
$result = $conn->query("Select * From `users` where `name` = '$usname1'");
$usname2 = $result->fetch_array();
$conn->query("DELETE FROM `basket` WHERE `product_idproduct` = '$prodid' and `users_idusers` = '$usname2[idusers]'");
echo '<script> document.location.href="basket.php"</script> ';



