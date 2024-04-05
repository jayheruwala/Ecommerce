<?php
session_start();
include_once 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['confirmOrder'])){
        $userId=$_SESSION['user_id'];
        $payment_method=$_POST['payment'];
        $payment_meth=$_POST['payment'];
        $payment_meth_id=0;


        $findOrderId="SELECT MAX(`order_id`) from orders";
        $findOrderIdResult=mysqli_query($conn,$findOrderId);
        if(mysqli_num_rows($findOrderIdResult) == true){
            $fetchFindOrderId=mysqli_fetch_array($findOrderIdResult);
            $orderId=$fetchFindOrderId[0]+1;
        }else{
            $orderId=1;
        }

        if($payment_method=="Credit Card"){
            $findCardId="SELECT MAX(`card_id`) FROM `card_info`";
            $findCardIdResult=mysqli_query($conn,$findCardId);
            if(mysqli_num_rows($findCardIdResult) == true){
                $fetchFindCardId=mysqli_fetch_array($findCardIdResult);
                $card_id=$fetchFindCardId[0]+1;
                echo $card_id;
                $payment_meth_id = $card_id;
                $cardNumber=$_POST['cardNumber'];
                $expMonth=$_POST['expMonth'];
                $expYear=$_POST['expYear'];
                $cvv=$_POST['CVV'];
                $paymentMethod=$payment_method."-".$card_id;
            }
        }else{
            $paymentMethod=$payment_method;
        }

        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime=date('y-m-d H:i:s');


        $orderUser = "INSERT INTO `order_user`(`order_id`,`user_id`,`order_Date_Time`,`payment_method`,`payment_id`) VALUES ($orderId,$userId,'$currentDateTime','$payment_meth',$payment_meth_id)";
        $orderUserResult = mysqli_query($conn,$orderUser);


        $cart="SELECT * FROM cart WHERE `user_id`=$userId";
        $cartResult=mysqli_query($conn,$cart);
        if(mysqli_num_rows($cartResult) > 0){
            while($fetchCartResult=mysqli_fetch_assoc($cartResult)){
                $OtableName=$fetchCartResult['table_name'];
                $OproductId=$fetchCartResult['product_id'];
                $Oquantity=$fetchCartResult['quantity'];
                $price=$fetchCartResult['price'];

                $orderItem = "INSERT INTO `order_item`(`order_id`,`product_id`,`tableName`,`Quantity`,`price`,`status`) values($orderId,$OproductId,'$OtableName',$Oquantity,$price,'Confirm')";
                $orderItemResult = mysqli_query($conn,$orderItem);
                
                $insertOrder="INSERT INTO `orders`(`order_id`, `userid`, `product_id`, `tableName`, `quantity`, `price`, `orderDateTime`, `status`, `payment_method`) VALUES ('$orderId', '$userId', '$OproductId', '$OtableName', '$Oquantity', '$price', '$currentDateTime', 'Confirm', '$paymentMethod')";
                if($insertOrderResult=mysqli_query($conn,$insertOrder) == true){
                    $fetchqun="SELECT * FROM `$OtableName` WHERE `product_id`=$OproductId";
                    $fetchqunResult=mysqli_query($conn,$fetchqun);
                    if($fetchqunResult == true){
                        $rowQty=mysqli_fetch_array($fetchqunResult);
                        $upadteQun=$rowQty['quantity']-$Oquantity;
                        $qunUpdate="UPDATE `$OtableName` SET `quantity`=$upadteQun where `product_id`=$OproductId";
                        $qunUpdateResult=mysqli_query($conn,$qunUpdate);

                    }
                    $cartDelete="DELETE FROM `cart` WHERE `user_id`=$userId AND `product_id`=$OproductId AND `table_name`='$OtableName'";
                    $cartDeleteResult=mysqli_query($conn,$cartDelete);
                }else{
                    echo"<script>alert('SomeThing Wrond Try AFTER SomeTime')</script>";
                    echo "error:".mysqli_error($conn);
                    // header("location:index.php");
                }
            }
        }else{
            // header("location:index.php");
        }

        if($payment_method == "Credit Card"){
            $cardQuery="INSERT INTO `card_info`(`card_id`, `order_id`, `card_number`, `cvv`, `exp_month`, `exp_year`) VALUES ($card_id,$orderId,$cardNumber,$cvv,$expMonth,$expYear)";
            if(($cardQueryResult=mysqli_query($conn,$cardQuery)) == true){
                // header("location:index.php");
            }else{
                // header("location:index.php");
                // echo "Error :" .mysqli_error($conn);
            }
        }
    }
}
    header("location:index.php");
?>