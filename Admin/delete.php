<?php
include_once 'pages/connection.php';

if(isset($_POST['productId']) && isset($_POST['tableName'])){
    $tableName = $_POST['tableName'];
    $productId = $_POST['productId'];

    $deleteQuery = "DELETE FROM `$tableName` WHERE `product_id` = $productId";
    $deleteQueryResult = mysqli_query($conn,$deleteQuery);
    if($deleteQueryResult == true){
        echo "Item Deleted Successfully";
    }else{
        echo "Failed to Delete";
    }
}
?>