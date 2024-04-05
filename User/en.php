
<?php


session_start();
include_once 'connection.php';

if(!isset($_SESSION['user_id'])){

}else{
    if(isset($_GET["productId"]) && isset($_GET['tableName'])){
        $productId=$_GET['productId'];
        $tableName=$_GET['tableName'];
        $userId=$_SESSION['user_id'];
        $quantity=1;
        $price = $_GET['price'];
        $checkQuantity="SELECT * FROM $tableName where `product_id`=$productId";
        $checkQuantityResult=mysqli_query($conn,$checkQuantity);
        if(mysqli_num_rows($checkQuantityResult)>0){
            $fetchQuantityResult=mysqli_fetch_assoc($checkQuantityResult);
            if($fetchQuantityResult['quantity']>0){
                $check="SELECT * FROM cart where `user_id`=$userId AND `product_id`=$productId AND `table_name`='$tableName'";
                $checkResult=mysqli_query($conn,$check);
                if(mysqli_num_rows($checkResult)>0){
                    echo"already Inserted";
                }else{
                    $addToCart="INSERT INTO cart(`user_id`,`product_id`,`table_name`,`quantity`,`price`) values ($userId,$productId,'$tableName',$quantity,$price)";
                    $addToCartResult=mysqli_query($conn,$addToCart);
                    if($addToCartResult === TRUE){
                        echo"Product Added to Cart Succefully";
                    }else{
                        echo "Error:".$addToCart."<br>".$conn->error;

                    }
                }
            }else{
                echo "Out of stock";
            }
        }else{
            echo"No Data Found";
        }
    }
}

if(isset($_POST['removeItem'])){
    $removeProductId=$_POST['removeProductId'];
    $removeTableName=$_POST['removeTableName'];
    $userId=$_SESSION['user_id'];
    $deleteQuery="DELETE FROM `cart` WHERE `user_id`=$userId AND `product_id`=$removeProductId AND `table_name`='$removeTableName'";
    if(($deleteQueryResult=mysqli_query($conn,$deleteQuery)) === true){
        header("location:cart.php");
    }else{
        echo"Error:".mysqli_error($conn);
    }
}


if(isset($_GET['updateProudtcId'])&& isset($_GET['updateTableName'])&& isset($_GET['updateQuantity'])){
    $updateProductId=$_GET['updateProudtcId'];
    $updatetableName=$_GET['updateTableName'];
    $updateQuantity=$_GET['updateQuantity'];
    $userId=$_SESSION['user_id'];
    $updateQuery="UPDATE cart SET `quantity`=$updateQuantity WHERE `user_id`=$userId AND `product_id`=$updateProductId AND `table_name`='$updatetableName'";
    $updateQueryResult=mysqli_query($conn,$updateQuery);
    if($updateQueryResult == true){
        echo"sucessfully";
    }else{
        echo"Error:".mysqli_error($conn);

    }
    
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['cancelOrder'])){
        $uTableName=$_POST['tableName'];
        $uProductId=$_POST['productId'];
        $uOrderId=$_POST['orderId'];
        $userId=$_SESSION['user_id'];
        $cancelQuery = "UPDATE `orders` SET `status`='Cancelled' WHERE `order_id`=$uOrderId AND `userid`=$userId AND `product_id`=$uProductId AND `tableName` = '$uTableName'" ;
        $cancelQueryResult=mysqli_query($conn,$cancelQuery);
        $cancelQuery2 = "UPDATE `order_item` SET `status`='Cancelled' WHERE `order_id`=$uOrderId AND `product_id`=$uProductId AND `tableName` = '$uTableName'" ;
        $cancelQueryResult2=mysqli_query($conn,$cancelQuery2);

        header("location:YourOrders.php");
    }
}
$conn->close();
?>