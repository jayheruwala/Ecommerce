<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/table.css">
</head>

<body>
<?php
include_once 'header.php';
?>
<section class="home">
    <div class="tab table-responsive">
        <table class="table caption-top">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Payment Method</th>
                    <th>Payment Id</th>
                    <th>Invoice</th>
                    <th>Product Info</th>
                </tr>
            </thead>
            <?php
            $orders="SELECT * FROM `order_user` ORDER BY `order_id` DESC";
            $ordersResult=mysqli_query($conn,$orders);
            if(mysqli_num_rows($ordersResult) > 0){
                while($fetchOrdersResult = mysqli_fetch_assoc($ordersResult)){
                    $userId=$fetchOrdersResult['user_id'];
                    $users="SELECT * FROM `register` where user_id=$userId";
                    $userResult=mysqli_query($conn,$users);
                    if($userResult == true){
                        while($fetchUsersResult = mysqli_fetch_assoc($userResult)){
            ?>
            <tbody>
                <tr>
                    <td><?php echo $fetchOrdersResult['order_id'] ?> </td>
                    <td><?php echo $fetchOrdersResult['user_id'] ?> </td>
                    <td><?php 
                    if($fetchOrdersResult['payment_method'] == "COD"){
                        echo "Cash On Delivery";
                    }else{
                        echo $fetchOrdersResult['payment_method'];
                    }
                     ?>
                    </td>
                    <td>
                        <?php
                        if($fetchOrdersResult['payment_method'] == "COD"){
                            echo "-";
                        }else{
                            echo $fetchOrdersResult['payment_id'];
                        }
                        ?>
                    </td>
                    <td><a href="invoice.php?orderId=<?php echo $fetchOrdersResult['order_id'] ?>">Invoice</a></td>
                    <td>
                        <table class="table">
                            <thead>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                            </thead>
                            <?php
                            $orderId=$fetchOrdersResult['order_id'];
                            $orderItem="SELECT * FROM `order_item` WHERE `order_id`=$orderId";
                            $orderItemResult=mysqli_query($conn,$orderItem);
                            if($orderItemResult == true){
                                while($fetchOrderItemResult=mysqli_fetch_assoc($orderItemResult)){
                                    $productId=$fetchOrderItemResult['product_id'];
                                    $tableName=$fetchOrderItemResult['tableName'];
                                    $product="SELECT * FROM $tableName WHERE `product_id` = $productId";
                                    $productResult=mysqli_query($conn,$product);
                                    if($productResult == true){
                                        while($fetchProductResult= mysqli_fetch_assoc($productResult)){
                                            ?>
                                            <tbody class="align-middle">
                                                <td><?php echo $fetchProductResult['product_id']; ?></td>
                                                <td class="name"><?php echo $fetchProductResult['product_name'];  ?></td>
                                                <td><?php echo $fetchOrderItemResult['Quantity'];?></td>
                                                <td><?php echo $fetchOrderItemResult['price']; ?></td>
                                                <td>
                                                    <select class="custom_select findstatus form-select" name="" id="" data-orderId="<?php echo $fetchOrderItemResult['order_id']?>" data-userId="<?php echo $userId?>" data-tableName="<?php echo $tableName ?>"data-productId="<?php echo $productId; ?>" >
                                                    <option value="" style="display:none;"><?php echo $fetchOrderItemResult['status'] ?></option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Confirm">Confirm</option>
                                                    <option value="Complete">Complete</option>
                                                    <option value="Cancelled">Cancelled</option>
                                                </select>
                                                </td>
                                            </tbody>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </table>
                    </td>
                </tr>
            </tbody>
            <?php
                        }
                    }
                }
            }else{
                ?>
                <tr>
                    <td colspan="7">No Order Available</td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</section>
<script>

    var findstatus = document.getElementsByClassName("findstatus");
for(i=0;i<findstatus.length;i++){
    findstatus[i].addEventListener("change",function(event){
        var target = event.target;
        var orderId = target.getAttribute("data-orderId");
        var productId = target.getAttribute("data-productId");
        var tableName = target.getAttribute("data-tableName");
        var userId = target.getAttribute("data-userId");
        var valueStatus = target.value;
        

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                displaySuccessMessage(this.responseText);
            }
        }
        xhr.open('GET','updateOrder.php?orderId='+orderId+'&userId='+userId+'&productId='+productId+'&tableName='+tableName+'&valueStatus='+valueStatus,true);
        xhr.send();
    })
}

function displaySuccessMessage(message){
    var successDiv = document.createElement('div');
    successDiv.classList.add('successDiv');
    successDiv.textContent = message;
    successDiv.style.backgroundColor='#000000';
    successDiv.style.color='white';
    successDiv.style.padding='5px 15px';
    successDiv.style.position='fixed';
    successDiv.style.bottom='10%';
    successDiv.style.left='50%';
    successDiv.style.transform='translateX(-50%)';
    successDiv.style.borderRadius='5px';
    successDiv.style.display='none';
    successDiv.style.display='none';
    successDiv.style.transition='display';
    successDiv.style.transitionDuration='1s';
    successDiv.style.transitionTimingFunction='ease';
    
    document.body.appendChild(successDiv);
    successDiv.style.display='block';
    setTimeout(function(){
        successDiv.style.display = 'none';
    },1500);

}
    </script>
</body>
</html>