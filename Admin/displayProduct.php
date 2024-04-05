<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/table.css">
</head>
<style>
    td{
        vertical-align: middle;
    }
    </style>
<body>
    <?php
        include_once 'header.php';
    ?>

    <section class="home">
        <div>


    <table class="table table-responsive caption-top">
        <?php
        $tableName = $_GET['tableName']; 
        ?>
        <caption class="">List Of <?php echo $tableName ?></caption>
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Brand</th>
                <th>Product Name</th>
                <th>image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        $query = "SELECT * FROM `$tableName`";
        $queryResult = mysqli_query($conn,$query);
        if(mysqli_num_rows($queryResult) > 0){
            while($fetchResult = mysqli_fetch_assoc($queryResult)){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $fetchResult['product_id'] ?></td>
                        <td><?php echo $fetchResult['brand_name'] ?></td>
                        <td><?php echo $fetchResult['product_name'] ?></td>
                        <td> <img src="AddForm/product/<?php echo $fetchResult['image'] ?>" alt="" style="width: 50px; mix-blend-mode: multiply;"> </td>
                        <td><?php echo $fetchResult['quantity'] ?></td>
                        <td><?php echo $fetchResult['price'] ?></td>
                        <td><?php echo $fetchResult['discount_price'] ?></td>
                        <td>
                            <a href="updateForm.php?tableName=<?php echo $tableName ?>&product_id=<?php echo $fetchResult['product_id'] ?>" class="btn btn-primary">UPDATE</a>
                            <button class="btn btn-danger delete-product" data-tableName="<?php echo $tableName ?>" data-productId="<?php echo $fetchResult['product_id'] ?>">DELETE</button>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            }else{
                ?>
                <tr>
                    <td colspan="7">No Data Found</td>
                </tr>
                <?php
            }
            ?>
    </table>
</div>
</section>

<script>
    var deleteProduct = document.getElementsByClassName('delete-product');
    for(i=0;i<deleteProduct.length;i++){
        deleteProduct[i].addEventListener("click",function(event){
            var target = event.target;
            var tableName = target.getAttribute("data-tableName");
            // alert("HEllo");
            var productId = target.getAttribute("data-productId");
            var xhr = new XMLHttpRequest();
            xhr.open("POST","delete.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    window.location.href='displayProduct.php?tableName='+tableName;
                }
            }
            xhr.send("productId="+productId+"&tableName="+encodeURIComponent(tableName));
        })
    }
</script>
</body>
</html>