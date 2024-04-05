
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="Assets/css/cart.css">
    </head>
    <body>
        <?php
        include_once 'header.php'
        ?>                           
        <?php
        if(!isset($_SESSION['user_id'])){
            ?>
            <div class="login_button">
                <a href="form/Login/form.php">Login</a>
            </div>
            <?php
        }else{

            ?>

        <div class="wrapper_cart">

            <div class="cart_block">
                <?php
                $userId=$_SESSION['user_id'];
                $cartQuery="SELECT * FROM cart where user_id=$userId";
                $cartQueryResult=mysqli_query($conn,$cartQuery);
                if(mysqli_num_rows($cartQueryResult)>0){
                    while($fetchCartQuery=mysqli_fetch_assoc($cartQueryResult)){
                        $tableNameX=$fetchCartQuery['table_name'];
                        $productIdX=$fetchCartQuery['product_id'];

                        $findProduct="SELECT * FROM $tableNameX WHERE product_id=$productIdX";
                        $findProductResult=mysqli_query($conn,$findProduct);
                        if(mysqli_num_rows($findProductResult) > 0){
                            while($fetchProduct=mysqli_fetch_assoc($findProductResult )){
                ?>
                                      
                <div class="cart_item">

                    <div class="item_image">
                        <img src="../Admin/AddForm/product/<?php echo $fetchProduct['image']?>" alt="">
                    </div>
                    <div class="item_info">
                        <div class="item_head">
                            <div class="product_name">
                                <h3><?php echo $fetchProduct['product_name'] ?></h3>
                            </div>
                            <form action="en.php" method="POST">
                            <div class="delete"><button name="removeItem"><img src="Assets/img/bin.png" alt=""> Delete</button>
                        </div>
                        
                        <input type="hidden" name="removeProductId" value="<?php echo $productIdX; ?>">
                        <input type="hidden" name="removeTableName" value="<?php echo $tableNameX; ?>">
                            </form>
                        </div>
                        <div class="stock_info">
                            <?php
                             $quantity=$fetchProduct['quantity'];
                             if($quantity > 5){
                            ?>

                            <p style="color: #4ccc9c;">Instock</p>
                            <?php
                             }
                             elseif($quantity > 0 && $quantity <=5){
                                 ?>
                                 
                             <p style="color: red;">Limited stock</p>
                             <?php
                             }elseif($quantity == 0){
                             ?>
                             <p style="color: red;">Out Of stock</p>
                                <?php
                             }
                                ?>
                        </div>
                        <div class="product_price">
                            ₹<?php echo $fetchProduct['discount_price'] ?> <del>₹<?php echo $fetchProduct['price'] ?></del>
                             <input type="hidden" value="<?php echo $fetchProduct['discount_price'] ?>" class="iprice" name="">
                        </div>
                        <div class="product_info">
                            <div class="product_quantity">
                                <p>Quantity</p>
                                <div class="pro_qun">
                                    <!-- <button onclick="minus()">-</button> 
                                    <input type="text" name="" id="pro_qua" value="1" 
                                        inputmode="numeric">
                                    <button onclick="plus()">+</button>-->
                                    <?php
                                    if($fetchProduct['quantity'] > 0){

                                    ?>
                                    <select onchange="subTotal()" class="iquantity" data-updateTableName="<?php echo $tableNameX ?>" data-updateProductId="<?php echo $productIdX ?>" >
                                
                                        <option style="display: none;" value="<?php echo $fetchCartQuery['quantity']?>"><?php echo $fetchCartQuery['quantity']?></option>
                                        <?php
                                        $iCheckQuantity=1;
                                        //finish
                                        while($fetchProduct['quantity']>=$iCheckQuantity){
                                            if($fetchProduct['quantity'] >= 1){
                                        ?>
                                        <option value="<?php echo $iCheckQuantity;?>"><?php echo $iCheckQuantity;?></option>
                                        <?php
                                            }
                                            $iCheckQuantity++;
                                            if($iCheckQuantity>=6){
                                                break;
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php
                                        }
                                    ?>

                                </div>
                            </div>
                            <div class="total_amount">
                                <p>Subtotal</p>
                                <h3 style="display: inline-block;">₹<h3 style="display: inline-block" class="itotal"></h3></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 

                                    }
                                }
                            }
                        }
                        else{
                            ?>
                            <h3>No item add in cart</h3>
                        <?php
                        }
                        ?>

            
                    </div>

            <div class="info_payment">
                <?php
                $userId = $_SESSION['user_id'];
                $displayDelivery = "SELECT * FROM `cart` WHERE `user_id` = $userId";
                $displayDeliveryResult = mysqli_query($conn,$displayDelivery);
                if(mysqli_num_rows($displayDeliveryResult) > 0){
                ?>
                <div class="user_info">
                    <div class="pmt_head">
                        <h3>Delivery Details</h3>
                    </div>
                    <div class="personal_detail">
                        <?php
                        $userId=$_SESSION['user_id'];
                        $deliveryQuery="SELECT * FROM `register` WHERE `user_id`='$userId'";
                        $deliveryQueryResult=mysqli_query($conn,$deliveryQuery);
                        if(mysqli_num_rows($deliveryQueryResult) > 0){
                            while($fetchdeliveryQueryResult=mysqli_fetch_assoc($deliveryQueryResult)){

                        ?>
                        <p class="info_p">Name:<?php echo $fetchdeliveryQueryResult['name'] ?></p>
                        <p class="info_p">Email Id:<?php echo $fetchdeliveryQueryResult['email_id'] ?></p>
                        <p class="info_p">Address:<?php echo $fetchdeliveryQueryResult['address'] ?></p>
                        <p class="info_p">City:<?php echo $fetchdeliveryQueryResult['city'] ?></p>
                        <p class="info_p">Contect No:<?php echo $fetchdeliveryQueryResult['mobile_no'] ?></p>
                        <?php
                            }
                        }else{
                            ?>
                            <p>Somthing went Wrong</p>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            
                 <div class="payment_block">
                    <div class="pmt_head">
                        <h3>Payment Details</h3>
                    </div>
                    <div class="pmt_info">
                        <div class="Subtotal_info pmt_det">
                            <p>Subtotal</p>
                            <!-- <p class="price">₹10000</p> -->
                            <div>
                            <p class="price" style="display: inline_block;" id="igrandtotal"></p>
                        </div>
                    </div>

                    <div class="shipping_info pmt_det">
                        <p>Shipping</p>
                        <!-- <p class="price">₹100</p> -->
                        <div>
                           <p class="price" style="display: inline_block;" id="shippingCharge">00</p>
                        </div>
                    </div>
                    <div class="discount_info pmt_det">
                        <p>Additional Discount</p>
                        <p class="price">-₹00</p>
                    </div>
                </div>
                <div class="final_amount">
                    <p>Total </p>
                    <div>
                        <p style="display: inline_block;" id="finalTotal">00</p>
                    </div>
                </div>
             </div>
              <div class="proceedBuy">
                <button>
                <a href="payment.php">Proceed to Buy</a>
                 </button>
               </div>
               <?php
                }
               ?>
               </div> 
               </div>
                <?php
                }
                ?>
                
                
                <!-- footer -->
                <?php
                include_once 'footer.php';
                ?>
                <script>
                    var iquantity =document.getElementsByClassName('iquantity');
var iprice =document.getElementsByClassName('iprice');
var itotal =document.getElementsByClassName('itotal');
var igrandtotal =document.getElementById('igrandtotal');
var ifinalTotal =document.getElementById('ifinalTotal');
var shippingCharge =document.getElementById('shippingCharge');

function subTotal() {
    gt=0;
    
    for(i=0;i<iquantity.length;i++){
        
        var updateProductId=iquantity[i].getAttribute("data-updateProductId");
        var updateTableName=iquantity[i].getAttribute("data-updateTableName");
        var updateQuantity=iquantity[i].value;
        // alert(updateProductId);
        // alert(updateTableName);
        // alert(updateQuantity);
        var xhr=new XMLHttpRequest();
        
        xhr.onreadystatechange=function(){
            if(this.readyState == 4 && this.status == 200){
                // alert(this.responseText);
            }
        }
    xhr.open('GET','en.php?updateProudtcId='+ updateProductId +'&updateTableName='+ updateTableName +'&updateQuantity='+ updateQuantity,true);
    xhr.send();

    itotal[i].innerHTML=(iprice[i].value)*(iquantity[i].value);
    gt=gt+((iprice[i].value)*(iquantity[i].value));
    }
    igrandtotal.innerText="₹"+gt;
    if(gt==0){
        shippingCharge.innerText="Free";

    }else{
        if(gt<5000){
            shippingCharge.innerText="+₹"+100;
            finalTotal.innerText="₹"+(gt+100);


        }else{
        shippingCharge.innerText="Free";
        finalTotal.innerText="₹"+gt;
        
        
        }
    }
}
subTotal();
                </script>

                   </body>
</html>