<?php

session_start();
include_once 'connection.php';
if(!isset($_SESSION['user_id'])){
    header("location:index.php");
}else{
    $userId=$_SESSION['user_id'];
    $tableNameX=$_SESSION['tableName'];
    $productIdX=$_SESSION['productId'];
    $quantity=$_SESSION['buyQty'];
    $currentDateTime=date('Y-m-d H:i:s');
    $payment_method=$_POST['payment'];
    $pmt_method=$payment_method;
    $price_query="SELECT discount_price FROM $tableNameX WHERE product_id=$productIdX";
    $result=mysqli_query($conn,$price_query);
    if(mysqli_num_rows($result) == 1){
        $row=mysqli_fetch_assoc($result);
        $price=$row["discount_price"];
    }else{
        header("location:index.php");
    }
    $findOrderId="SELECT MAX(`order_id`) FROM `orders`";
    $findOrderIdResult=mysqli_query($conn,$findOrderId);
    if(mysqli_num_rows($findOrderIdResult) == true){
        $fetchFindOrderId=mysqli_fetch_array($findOrderIdResult);
        $orderId=$fetchFindOrderId[0] + 1;
    }else{
        $orderId=1;
    }
    if($payment_method == "Credit Card"){
        $findCardId="SELECT MAX(`card_id`) FROM `card_info`";
        $findCardIdResult=mysqli_query($conn,$findCardId);
        if(mysqli_num_rows($findCardIdResult) == true){
            $fetchFindCardId=mysqli_fetch_array($findCardIdResult);
            $card_id=$fetchFindCardId[0]+1;
            $cardNumber=$_POST['cardNumber'];
            $expMonth=$_POST['expMonth'];
            $expYear=$_POST['expYear'];
            $cvv=$_POST['CVV'];
            $payment_method=$payment_method . "-" ."$card_id";
        }
    }else{
        $payment_method=$payment_method;
    }
    // insert Query Order
    
    $insertOrder="INSERT INTO `orders` (`order_id`, `userid`, `product_id`, `tableName`, `quantity`, `price`, `orderDateTime`, `status`, `payment_method`) VALUES ('$orderId','$userId','$productIdX','$tableNameX','$quantity','$price','$currentDateTime','Confirm','$payment_method')";
    if(($insertOrderResult=mysqli_query($conn,$insertOrder)) == TRUE){
        $insertOrderItem="INSERT INTO `order_item`(`order_id`, `product_id`, `tableName`, `Quantity`, `price`, `status`) VALUES ('$orderId','$productIdX','$tableNameX','$quantity','$price','Confirm')";
        mysqli_query($conn,$insertOrderItem);
        $PaymentIdQuery="SELECT MAX(`payment_id`) FROM `order_user`";
        $paymentIdResult=mysqli_query($conn,$PaymentIdQuery);
        if(mysqli_num_rows($paymentIdResult) == true){
            $fetchPaymentIdResult=mysqli_fetch_array($paymentIdResult);
            $payment_id=$fetchPaymentIdResult[0]+1;
            $insertOrderUser="INSERT INTO `order_user`(`order_id`, `user_id`, `order_Date_Time`, `payment_method`, `payment_id`) VALUES ('$orderId','$userId','$currentDateTime','$pmt_method','$payment_id')";
            mysqli_query($conn,$insertOrderUser);
        }

        $fetchqun="SELECT * FROM `$tableNameX` WHERE `product_id`=$productIdX";
        if(($fetchqunResult=mysqli_query($conn,$fetchqun)) == true){
            $rowQty=mysqli_fetch_array($fetchqunResult);
            $updateQun=$rowQty['quantity']-$quantity;
            $qunUpdate="UPDATE `$tableNameX` SET `quantity`=$updateQun WHERE `product_id`=$productIdX";
            $qunUpdateResult=mysqli_query($conn,$qunUpdate);            
        }
    }else{
        echo "<script>alert('Somthing Wrong Try After Some Time');</script>";
        echo "Error:". mysqli_error($conn);
        header("location:index.php");

    }
}
if($pmt_method == "Credit Card"){
   
    $cardQuery="INSERT INTO `card_info` (`card_id`, `order_id`, `card_number`, `cvv`, `exp_month`, `exp_year`) VALUES ('$card_id','$orderId','$cardNumber','$cvv','$expMonth','$expYear')";
    if(($cardQueryResult=mysqli_query($conn,$cardQuery)) == true){
        header("loaction:index.php");
        echo "<script> window.location.href=index.php'; </script>";
    }else{
        echo "Error:". mysqli_error($conn);
    }
}
echo "<script> window.location.href='index.php'; </script>";
header("loaction:index.php");
?>
