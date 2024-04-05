<?php
session_start();
if(isset($_POST['buyNow'])){
$tableName=$_POST['tab_name'];
$productId=$_POST['pro_id'];

$_SESSION['tableName']=$tableName;
$_SESSION['productId']=$productId;
header("location:buy.php");
}else{
    if(isset($_POST['payNow'])){
        $buyQty=$_POST['buyQty'];
        $_SESSION['buyQty']=$buyQty;
        $payprice=$_POST['payprice'];
    $_SESSION['payprice']=$payprice;
    header("location:buypayment.php");
    }else{
        header("location:index.php");
    
    }

}
?>

