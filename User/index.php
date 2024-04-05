<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="Assets/css/style.css">

<body>
  
  
   

    <!-- display Products -->
    <div class="main_block">
        <div class="main_head">
            <h3>Top Products </h3>
        </div>
        <?php
        $categoryQuery = "select * from categories_info";
        $categoryQueryResult = mysqli_query($conn,$categoryQuery);
        if(mysqli_num_rows($categoryQueryResult) > 0){
            while($fetchCategoryQueryResult = mysqli_fetch_assoc($categoryQueryResult)){
                $tableName = $fetchCategoryQueryResult['category_name'];

                $displayProduct = "SELECT * FROM $tableName ORDER BY product_id ASC";
                $displayProductResult = mysqli_query($conn,$displayProduct);
                if(mysqli_num_rows($displayProductResult) > 0){
        ?>
        <div class="product_title" >
            <?php echo $tableName ?>
        </div>
        <div class="product_group">
            <?php
            while($fetchDisplayProduct = mysqli_fetch_assoc($displayProductResult)){
                $productId = $fetchDisplayProduct['product_id'];
                ?>

            <div class="product">
                <a href="onproduct.php?productId=<?php echo $fetchDisplayProduct['product_id']?>&tableName=<?php echo $tableName ?>">
                <div class="product_img">
                <img src="../Admin/AddForm/product/<?php echo $fetchDisplayProduct['image']?>" alt="">

                </div>
                <div class="product_detail">
                    <div class="product_name">
                        <h3> <a href="onproduct.php?productId=<?php echo $fetchDisplayProduct['product_id']?>&tableName=<?php echo $tableName ?>"><?php echo $fetchDisplayProduct['product_name'] ?></a></h3>
                    </div>
                    <div class="product_det">
                    </div>
                    <div class="product_price">
                        <?php
                            $priceProduct = $fetchDisplayProduct['discount_price'];
                        ?>
                        <h3>
                            <div class="actual_price">₹<?php echo $fetchDisplayProduct['discount_price'] ?>
                                <bdi>
                                    ₹<?php echo $fetchDisplayProduct['price'] ?>
                                </bdi>
                            </div>
                        </h3>
                    </div>
                    <!-- Add to cart button  -->
                    <div class="add_to_cart">
                    <?php
                            if(!isset($_SESSION['user_id'])){
                        ?>
                            <button id="stop" onclick="go_cart()" class="cert_x cert_bn2">Add To Cart</button>
                            <?php
                            }else{
                        ?>
                        <button data-price="<?php echo $priceProduct ?>" data-tableName="<?php echo $tableName;?>" data-id="<?php echo $productId; ?>" class="cert_x cert_bnt">Add To Cart</button>
                        
                        <?php
                            }
                        ?>
                        

                    </div>
                </div>
            </a>
            </div>
            <?php
            }
            ?>

        </div>
        <?php
                }
            }
        }
        ?>
    </div>

   <?php
   include_once 'footer.php';
   ?>

<script>
        function go_cart(){
            window.location.href = "form/login/form.php";
        }


        var product_id = document.getElementsByClassName("cert_bnt");
        for(var i =0;i<product_id.length;i++){
            product_id[i].addEventListener("click",function(event){
                var target = event.target;
                var productId = target.getAttribute("data-id");
                var tableName =target.getAttribute("data-tableName");
                var priceProduct =target.getAttribute("data-price");
                
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        
                        displaySuccessMessage(this.responseText);

                    }
                }
                xhr.open('GET','en.php?productId='+productId+'&tableName='+tableName+'&price='+priceProduct,true);
                xhr.send();
            })
        }
        

        function displaySuccessMessage(message){
    var successDiv = document.createElement('div');
    successDiv.classList.add('successDiv');
    successDiv.style.backgroundColor='#ed1d24';
    successDiv.textContent=message;
    successDiv.style.color='white';
    successDiv.style.padding='5px 10px';
    successDiv.style.position='fixed';
    successDiv.style.bottom='10%';
    successDiv.style.left='50%';
    successDiv.style.transform='translateX(-50%)';
    successDiv.style.borderRedius='5px';
    successDiv.style.display='none';
    successDiv.style.transition='display';
    successDiv.style.transitionDuration='1s';
    successDiv.style.transitionTimingFunction='ease';

    document.body.appendChild(successDiv);

    successDiv.style.display='block';

    setTimeout(function(){
        successDiv.style.display='none';
    },1500);
}

    </script>

</body>

</html>