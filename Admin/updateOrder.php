<?php
include_once 'pages/connection.php';
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET['orderId']) && isset($_GET['userId']) && isset($_GET['productId']) && isset($_GET['tableName'])){
        $orderId = $_GET['orderId'];
        $userId = $_GET['userId'];
        $productId = $_GET['productId'];
        $tableName = $_GET['tableName'];
        $valueStatus = $_GET['valueStatus'];

       

        $updateOrders = "UPDATE `orders` SET `status`='$valueStatus' WHERE `order_id`=$orderId AND `userid`=$userId AND `product_id`=$productId AND `tableName`='$tableName'";
        $updateOrdersResult = mysqli_query($conn,$updateOrders);

        if($updateOrdersResult == true){
            echo "Update ";
        }else{
            echo "Failed to ";
        }
        
        $updateStatusOrderItem = "UPDATE `order_item` SET `status`='$valueStatus' WHERE  `order_id`=$orderId AND `product_id`=$productId AND `tableName`='$tableName'";
        $updateStatusOrderItemResult = mysqli_query($conn,$updateStatusOrderItem);

        if($updateStatusOrderItemResult == true){
            echo " Successfully";
        }else{
            echo " Update";
        }
    }
}
?>
