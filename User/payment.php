<?php
session_start();
include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/payment.css">
</head>
<style>
    .creditCard{
        display: block;
    }
</style>
<body>
    <form onsubmit="return validateAndPay()" action="paymentx.php" method="post">
        <div class="mainBlock">
            <div class="paymentBlock">
                <div class="pay_head">
                    <h3>Payment Method</h3>
                </div>
                <div class="payment_option">
                    <div class="choose_option">
                        <input type="radio" onclick="closeCard()" name="payment" id="pay" value="COD" checked>
                        <p>Cash on Delivery</p>
                    </div>
                    <div class="choose_option">
                        <input type="radio" onclick="openCard()" name="payment" id="payCreditCard" value="Credit Card" >
                        <p>Credit Card</p>
                    </div>
                </div>
            </div>
            <div class="credit-card" id="creditCard">
                <div class="pay_head">
                    <h3>Card Detail</h3>
                </div>
                <div class="card-number">
                    <input type="text" maxlength="19" minlength="19" name="cardNumber" id="cardNumber" placeholder="" class="input_field">
                    <label for="" class="input_label">Card Numner</label>
                    <div class="error-message" id="number-error-message"></div>
                </div>
                <div class="card-number">
                    <div class="card_head" style="color:#999;">Expiry Date</div>
                    <div class="card_inf">
                        <div class="card_exp">
                            <div class="card-number card-info">
                                <select name="expMonth" id="expMonth">
                                    <option value="">MM</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <select name="expYear" id="expYear">
                                    <option value="">YYYY</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option> 
                                </select>
                            </div>
                            <div id="exp-error-message" class="error-message"></div>
                        </div>
                        <div class="card-number cardCVV">
                            <input type="text" maxlength="3" class="input_field" placeholder=""  name="CVV" id="cvv">
                            <label for="" class="input_label">CVV</label>
                            <div class="error-message" id="cvv-error-message"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <?php
        $userId = $_SESSION['user_id'];
        $totalAmount = 0;
        $totalQuery = "SELECT * FROM `cart` WHERE `user_id`=$userId";
        $totalQueryResult = mysqli_query($conn,$totalQuery);
        if(mysqli_num_rows($totalQueryResult) > 0){
            while($fetchTotalResult = mysqli_fetch_assoc($totalQueryResult)){
                $totalAmount+=($fetchTotalResult['price']*$fetchTotalResult['quantity']);
            }
        }
        if($totalAmount < 5000){
            $totalAmount+=100;
        }
        ?>

        <div class="pyButton">
            <input type="submit" value="Pay&nbsp;<?php echo $totalAmount ?>" name="confirmOrder">
        </div>
    </form>
    <script src="Assets/js/payment.js"></script>
</body>
</html>