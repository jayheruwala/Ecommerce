<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="Assets/css/style2.css">
<body>
    <?php
    include_once 'header.php';
    $tableName=$_GET['categoryName'];
    $tableId=$_GET['categotyId'];
    ?>
    <main>
    
    <?php
    $displayDataQuery="SELECT * FROM $tableName";
    $displayDataQueryResult=mysqli_Query($conn,$displayDataQuery);
    
    if((mysqli_num_rows($displayDataQueryResult)) > 0){
        ?>
        <div class="product_container">
            <?php
            while($fetchDisplayDataQueryResult=mysqli_fetch_assoc($displayDataQueryResult)){
                $productId = $fetchDisplayDataQueryResult['product_id'];
                ?>
                <div class="product">
                    <div class="product_img">
                        <img src="../Admin/AddForm/product/<?php echo $fetchDisplayDataQueryResult['image']?>" alt="">
                    </div>
                    <div class="product_detail">
                        <div class="product_name">
                            <p class="brand_name"><?php echo $fetchDisplayDataQueryResult['brand_name']?></p>
                            <p class="product_name"><?php echo $fetchDisplayDataQueryResult['product_name']?></p>
                        </div>
                        <?php
                            $priceProduct = $fetchDisplayDataQueryResult['discount_price'];
                        ?>
                        <div class="product_price">
                            <p>₹<?php echo $fetchDisplayDataQueryResult['discount_price'] ?><del>₹<?php echo $fetchDisplayDataQueryResult['price']?></del></p>
                        </div>
                        <div class="product_det">
                            <?php
                            if($tableName == 'mobile'){
                                ?>
                                <div class="box">Processer:<?php echo $fetchDisplayDataQueryResult['processer']?></div>
                                <div class="box">Battery:<?php echo $fetchDisplayDataQueryResult['battery']?></div>
                                <div class="box">Ram:<?php echo $fetchDisplayDataQueryResult['ram']?></div>
                                <div class="box">Storage:<?php echo $fetchDisplayDataQueryResult['rom']?></div>
                                <div class="box">Display:<?php echo $fetchDisplayDataQueryResult['display']?></div>
                                <div class="box">Front Camera:<?php echo $fetchDisplayDataQueryResult['front_camera']?></div>
                                <div class="box">Back Camera:<?php echo $fetchDisplayDataQueryResult['back_camera']?></div>
                            <?php
                            }

                            ?>

                       <?php
                            if($tableName == 'laptop'){
                        ?>
                                <div class="box">Processer:<?php echo $fetchDisplayDataQueryResult['processer']?></div>
                                <div class="box">Battery:<?php echo $fetchDisplayDataQueryResult['battery']?></div>
                                <div class="box">Ram:<?php echo $fetchDisplayDataQueryResult['ram']?></div>
                                <div class="box">Storage:<?php echo $fetchDisplayDataQueryResult['rom']?></div>
                                <div class="box">Display:<?php echo $fetchDisplayDataQueryResult['display']?></div>
                                <div class="box">Front Camera:<?php echo $fetchDisplayDataQueryResult['front_camera']?></div>
                                <div class="box">Graphics card:<?php echo $fetchDisplayDataQueryResult['graphics_card']?></div>
                            <?php
                            }
                            
                            ?>
                    
                    <?php
                            if($tableName == 'cpu'){
                        ?>
                                <div class="box">Processer:<?php echo $fetchDisplayDataQueryResult['processer']?></div>
                                <div class="box">Ram:<?php echo $fetchDisplayDataQueryResult['ram']?></div>
                                <div class="box">Storage:<?php echo $fetchDisplayDataQueryResult['rom']?></div>
                                <div class="box">Graphics card:<?php echo $fetchDisplayDataQueryResult['graphics_card']?></div>
                            <?php
                            }
                            
                            ?>

                            <?php
                            if($tableName == 'accessories'){
                            ?>
                            <?php

                            }
                            
                            ?>

                             <?php
                            if($tableName == 'wirelessaccessories'){
                        ?>
                                <div class="box">Battery:<?php echo $fetchDisplayDataQueryResult['battery']?></div>
                                <div class="box">PlayBack Time:<?php echo $fetchDisplayDataQueryResult['playback']?></div>
                            <?php
                            }
                            
                            ?>
                        
                    </div>
                    <div class="product_buttons">
                        <?php
                            if(!isset($_SESSION['user_id'])){
                        ?>
                            <button id="stop" onclick="go_cart()" class="cert_bn2 cert_x">Add To Cart</button>
                            <?php
                            }else{
                        ?>
                        <button data-price="<?php echo $priceProduct ?>" data-tableName="<?php echo $tableName;?>" data-id="<?php echo $productId; ?>" class="cert_bnt cert_x">Add To Cart</button>
                        <?php
                            }
                        ?>
                    </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
<?php
    }else{
        ?>
        <div class="product_container">
            <h2>No Data Found</h2>
    </div>
    <?php
    }
    ?>
    </main>
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
                        // alert(this.responseText);
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