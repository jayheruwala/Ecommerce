<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/YourOrders.css">
</head>
<style>
    .image img{
        width: 70%;
    max-width: 100%;
    height: 90%;
    max-height: 100%;
    object-fit: contain;
    cursor: pointer;
    -webkit-tap-highlight-color: transparent;
    mix-blend-mode: multiply;
    }
</style>
<body>
    <?php
        include_once 'header.php';
        $userId = $_SESSION['user_id'];
    ?>

    <div class="past_orders">
        <?php
            $orderQuery = "SELECT * FROM orders WHERE `userid` = $userId ORDER BY `orderDateTime` DESC";
            $orderQueryResult = mysqli_query($conn,$orderQuery);

            if($orderQueryResult == true){
        ?>
        <div class="title">
            <h2>Your Orders</h2>
        </div>
        <div class="order_block">
            <?php
            while($fetchOrdersQueryResult = mysqli_fetch_assoc($orderQueryResult)){
                $orderIdInvoice = $fetchOrdersQueryResult['order_id'];
                $tableName = $fetchOrdersQueryResult['tableName'];
                $productId = $fetchOrdersQueryResult['product_id'];
                $findProduct = "SELECT * FROM `$tableName` WHERE `product_id` = $productId";
                $findProductResult = mysqli_query($conn,$findProduct);
                if($findProduct == true){
                    while($fetchFindProductResult = mysqli_fetch_assoc($findProductResult)){
            ?>
            <div class="order">
                <div class="image"><img src="../Admin/AddForm/product/<?php echo $fetchFindProductResult['image'] ?>" alt=""></div>
                <div class="desc">
                    <div class="top">
                        <div class="product_title"><?php echo $fetchFindProductResult['product_name'] ?> </div>
                        <div class="invoice details"><a href="invoice.php?orderId=<?php echo $orderIdInvoice; ?> ">Download Invoice</a></div>
                    </div>
                    <?php
                    $findUser = "SELECT * FROM `register` WHERE `user_id` = $userId";
                    $findUserResult = mysqli_query($conn,$findUser);
                    if($findUserResult == true){
                        while($fetchUser = mysqli_fetch_assoc($findUserResult)){
                            ?>
                            <div class="shippind_address details">
                                <p class="det_tit">Shipping-Address : </p> &nbsp;&nbsp;<p> <?php echo $fetchUser['address']. " - " . $fetchUser['city'] . " - " .$fetchUser['pin_code'] ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <div class="order_time details">
                        <p class="det_tit">Order Date-Time : </p>&nbsp;&nbsp; <p> <?php echo $fetchOrdersQueryResult['orderDateTime'] ?></p>
                    </div>
                    <div class="payment_method details">
                        <?php
                        $cardInformation = explode('-',$fetchOrdersQueryResult['payment_method']);
                        ?>
                        <p class="det_tit">Payment Method :</p>&nbsp;&nbsp;<p> <?php echo $cardInformation[0] ?></p>
                    </div>
                    <div class="top">
                        <div class="order_status details">
                            <p class="det_tit">Order Status : </p> &nbsp;&nbsp; <p> <?php echo $fetchOrdersQueryResult['status'] ?></p>
                        </div>
                        <div class="button">
                            <form action="en.php" method="post">
                                <input type="hidden" name="orderId" value="<?php echo $fetchOrdersQueryResult['order_id'] ?>">
                                <input type="hidden" name="tableName" value="<?php echo $fetchOrdersQueryResult['tableName'] ?>">
                                <input type="hidden" name="productId" value="<?php echo $fetchOrdersQueryResult['product_id'] ?>">
                                <?php
                                if($fetchOrdersQueryResult['status'] != 'Cancelled'){
                                   
                                ?>
                                <button class="cancle" type="submit" name="cancelOrder">Cancel Order</button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            }
            }else{
                ?>
                <div class="order" style="font-weight:500;font-size:20px;">No Order in Past</div>
                <?php
            }
            ?>
        </div>
   
    </div>
    <?php
    include_once 'footer.php';
    ?>
</body>
</html>