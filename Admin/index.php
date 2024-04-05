<?php
include_once 'pages/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>

<style>
    *{
        font-family: 'Rubik';
    }
    .container {
        width: 90%;
        margin: 100px auto;
    }

    .deshboard {
        display: flex;
        justify-content: space-between;
        flex-wrap:wrap;
    }

    .card {
        margin-top: 50px;
        min-width: 23%;
        max-width: 23%;
        background-color: white;
        box-shadow: rgba(224, 224, 224, 0.8) 0 0 10px 1px;
        padding: 15px 20px;
        border-radius: 12px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .cardblock{
        display: flex;
        justify-content: space-between;
    }


    
    .cardblock > .icon{
        background-color: orange;
        min-width: 70px;
        max-width: 80px;
        height: 80px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        top: -40px;
        border-radius: 12px;
        transition: all .5s ease-in;

    }
    .card:hover .icon{
        top: 0;
    }
    .icon  i{
        font-size: 40px;
        color: white;
        font-weight: 600;
    }
    .detail{
        width:60%;
        /* word-wrap:break-all; */
        font-size: 18px;
        color: #666;
        text-align:right;
        text-transform: capitalize;
    }
    .number{
        margin-top: 4px;
        color: black;
        opacity: 1;
        font-size: 19px;
    }
    .another{
        width: 100%;

    }

    .another::before{
        content: "";
        display: block;
        width: 100%;
        height: 1px;
        background-color:  rgb(216, 216, 216);
        margin-bottom: 10px;
        margin-top: 10px;
        padding-left: 0;
    }

    .another a{
        min-width: 100%;
        cursor: pointer;
        margin-left: 10px;
        color: dimgray;
        font-weight: normal;
        transform-origin: center;
        transition: all 0.8s ease-in-out;
        text-transform: capitalize;
        text-decoration:none;
    }
    .another a:hover{
        font-weight: 400;
        color: orange;
    }

    .productTitle{
        margin-top: 25px;
        font-size: 22px;
        opacity: .7;
    }

</style>

<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="container">

        <div class="deshboard">
            <div class="card">
                <div class="cardblock">
                    <div class="icon">
                        <i class="bi-person"></i>
                    </div>
                    <?php
                        $totalCustomer = mysqli_query($conn,"SELECT COUNT(*) AS CUSTOMER_COUNT FROM `register`");
                        if($totalCustomer){
                            $totalCustomerFetch = mysqli_fetch_assoc($totalCustomer);
                            $totalCustomers = $totalCustomerFetch['CUSTOMER_COUNT'];
                        }else{
                            $totalCustomers = 0;
                        }
                    ?>
                    <div class="detail">
                        Total Customer <br>
                        <p class="number"><?php echo $totalCustomers ?></p>
                    </div>
                </div>
                <div class="another">
                    <a href="customer.php">Customer</a>
                </div>
            </div>
            <div class="card">
                <div class="cardblock">
                    <div class="icon">
                        <i class="bi-box-seam"></i>
                    </div>
                    <?php
                        $totalOrder = mysqli_query($conn,"SELECT COUNT(*) AS CUSTOMER_COUNT FROM `orders`");
                        if($totalOrder){
                            $totalOrderFetch = mysqli_fetch_assoc($totalOrder);
                            $totalOrders = $totalOrderFetch['CUSTOMER_COUNT'];
                        }else{
                            $totalOrders = 0;
                        }
                    ?>
                    <div class="detail">
                        Total Orders <br>
                        <p class="number"><?php echo $totalOrders ?></p>
                    </div>
                </div>
                <div class="another">
                    <a href="orders.php">Orders</a>
                </div>
            </div>
            <div class="card">
                <div class="cardblock">
                    <div class="icon">
                        <i class="bi-box-money" style="font-weight:100;">&#8377</i>
                    </div>
                    <?php
                    $currentMonth = date('m');
                    $sql = "SELECT SUM(price*quantity) AS total_amount FROM orders WHERE MONTH(orderDateTIme) = $currentMonth";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $row = mysqli_fetch_assoc($result);
                        $totalAmount = $row['total_amount'];
                    }else{
                        $totalAmount == 00;
                    }
                    ?>
                    <div class="detail">
                        Total Amount  <br> Of Sales <br>
                        <p class="number">&#8377;<?php echo number_format($totalAmount,2) ?></p>

                    </div>
                </div>
                <div class="another">
                    <a href="">Current Month Sales</a>
                </div>
            </div>
            <div class="card">
                <div class="cardblock">
                    <div class="icon">
                        <i class="bi-server"></i>
                    </div>
                    <div class="detail">
                        Add Product <br>
                        <!-- <p class="number">1000</p> -->

                    </div>
                </div>
                <div class="another">
                    <a href="AddForm/product/product.php">Add Product</a>
                </div>
            </div>
            <div class="card">
                <div class="cardblock">
                    <div class="icon">
                        <i class="bi-box-arrow-in-right"></i>
                    </div>
                    <div class="detail">
                        Log Out <br>
                        <!-- <p class="number">1000</p> -->

                    </div>
                </div>
                <div class="another">
                    <a href="pages/logout.php">Log Out</a>
                </div>
            </div>
        </div>
        <div class="productTitle">Products</div>
        <div class="deshboard">
            <?php
                    $category = "SELECT * FROM categories_info ORDER BY `category_name` ASC";
                    $categoryQuery = mysqli_query($conn, $category);
                    if ($categoryQuery == true) {
                        while ($fetchCategory = mysqli_fetch_assoc($categoryQuery)) {
                            $categoryName = $fetchCategory['category_name'];
                            $Count = "SELECT COUNT(*) AS total_Product FROM $categoryName";
                            $resultCount = mysqli_query($conn,$Count);
                            if($resultCount){
                                $resultCountX = mysqli_fetch_assoc($resultCount);
                                $totalProducts = $resultCountX['total_Product'];
                            }else{
                                $totalProducts = 00;
                            }
            ?>
            <div class="card">
                <div class="cardblock">
                    <div class="icon">
                        <i class="bi-list-ul"></i>
                    </div>
                    <div class="detail" style="word-wrap: break-word;">
                        <?php echo $fetchCategory['category_name'] ?> <br>
                        <p class="number"><?php echo $totalProducts ?></p>

                    </div>
                </div>
                <div class="another">
                    <a href="displayProduct.php?tableName=<?php echo $fetchCategory['category_name'] ?> " class="" ><?php echo $fetchCategory['category_name'] ?></a>
                </div>
            </div>
            <?php
                        }
                    }
            ?>
        </div>
    </div>
</body>

</html>