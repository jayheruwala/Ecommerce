<?php
include_once 'pages/connection.php';
if (!isset($_SESSION['adminId'])) {
    header('Location:Login/index.php');
} else {
    $adminId = $_SESSION['adminId'];
}
?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">

</head>

<link rel="stylesheet" href="css/updateform.css">



<body>
    <?php
    // include_once 'header.php';
    include_once 'pages/connection.php';
    ?>
    <section class="home">
        <div class="limiter">
            <div class="container-login" style="background-image: url('Login/images/cool-background.png');">
                <div class="wrap-login ">

                    <?php
                    $productId = $_GET['product_id'];
                    $tableName = $_GET['tableName'];

                    $findQuery = "SELECT * FROM $tableName WHERE `product_id`=$productId";
                    $findQueryResult = mysqli_query($conn, $findQuery);
                    if ($findQueryResult == true) {
                        while ($fetchQueryResult = mysqli_fetch_assoc($findQueryResult)) {
                    ?>

                            <form action="update.php" method="post" class="login-form validate-form " enctype="multipart/form-data">
                                <!-- <div class="block d-flex"> -->
                                <input type="hidden" name="tableName" value="<?php echo $tableName ?>">
                                <div class="flex-container">
                                    <label class="txt1" for="">Product Id</label>
                                </div>
                                <div class="wrap-input validate-input">
                                    <input type="text" name="productId" id="productId" value="<?php echo $fetchQueryResult['product_id'] ?>" required readonly>
                                </div>
                                <div class="flex">
                                    <div class="flex-container">
                                        <label class="txt1" for="">Brand Name</label>
                                        <div class="wrap-input validate-input">
                                            <input type="text" name="brandName" id="brandName" value="<?php echo $fetchQueryResult['brand_name'] ?>" required>
                                            <span class="error" id="brandnameErr"></span>
                                        </div>
                                    </div>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Product Name</label>
                                        <div class="wrap-input validate-input">
                                            <input type="text" name="productName" id="productName" value="<?php echo $fetchQueryResult['product_name'] ?>" required>
                                            <span class="error" id="productnameErr"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- </div> -->
                                <?php
                                if ($tableName == 'wirelessaccessories' || $tableName == 'accessories') {
                                ?>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Product Type</label>
                                        <div class="wrap-input validate-input">
                                            <input type="text" name="type" id="type" value="<?php echo $fetchQueryResult['product_type'] ?>" required>
                                            <span class="error" id="typeErr"></span>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="flex ">
                                    <div class="flex-container">
                                        <label class="txt1" for="">Quantity</label>
                                        <div class="wrap-input validate-input">
                                            <input type="number" name="quantity" id="quantity" value="<?php echo $fetchQueryResult['quantity'] ?>" required inputmode="numeric">
                                            <span class="error" id="quantityErr"></span>
                                        </div>
                                    </div>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Image</label>
                                        <div class="wrap-input validate-input">
                                            <input type="file" name="image" id="image" multiple>
                                        </div>
                                        <span class="error" id="imageErr"></span>
                                    </div>
                                </div>
                                <?php
                                if ($tableName == 'mobile' || $tableName == 'laptop' || $tableName == 'CPU') {
                                ?>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Processor</label>
                                    </div>
                                    <div class="wrap-input validate-input">
                                        <input type="text" name="processor" id="processor" value="<?php echo $fetchQueryResult['processer'] ?>" required>
                                        <span class="error" id="processorErr"></span>
                                    </div>
                                <?php
                                }
                                ?>

                                <!-- </div> -->
                                <div class="flex">
                                    <?php
                                    if ($tableName == 'mobile') {
                                    ?>
                                        <div class="flex-container">
                                            <label class="txt1" for="">Back Camera</label>
                                            <div class="wrap-input validate-input">
                                                <input type="text" name="backCamera" id="backCamera" value="<?php echo $fetchQueryResult['back_camera'] ?>" required>
                                                <span class="error" id="backCameraErr"></span>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($tableName == 'laptop' || $tableName == 'cpu') {
                                    ?>
                                        <div class="flex-container">
                                            <label class="txt1" for="">Graphics Card</label>
                                            <div class="wrap-input validate-input">
                                                <input type="text" name="graphicsCard" id="graphicsCard" value="<?php echo $fetchQueryResult['graphics_card'] ?>" required>
                                                <span class="error" id="graphicsCardErr"></span>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($tableName == 'mobile' || $tableName == 'laptop') {
                                    ?>
                                        <div class="flex-container">
                                            <label class="txt1" for="">Front Camera</label>
                                            <div class="wrap-input validate-input">
                                                <input type="text" name="frontCamera" id="frontCamera" value="<?php echo $fetchQueryResult['front_camera'] ?>" required>
                                                <span class="error" id="frontCameraErr"></span>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if ($tableName == 'mobile' || $tableName == 'laptop' || $tableName == 'wirelessaccessories') {
                                ?>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Battery</label>
                                    </div>
                                    <div class="wrap-input validate-input">
                                        <input type="text" name="battery" id="battery" value="<?php echo $fetchQueryResult['battery'] ?>" required>
                                        <span class="error" id="batteryErr"></span>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- </div> -->
                                <!-- <div class="block d-flex"> -->

                                <?php
                                if ($tableName == 'wirelessaccessories') {
                                ?>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Play Back Time</label>
                                    </div>
                                    <div class="wrap-input validate-input">
                                        <input type="text" name="playBack" id="playBack" value="<?php echo $fetchQueryResult['playback'] ?>" required>
                                        <span class="error" id="playBackErr"></span>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($tableName == 'mobile' || $tableName == 'laptop') {
                                ?>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Display</label>
                                    </div>
                                    <div class="wrap-input validate-input">
                                        <input type="text" name="display" id="display" value="<?php echo $fetchQueryResult['display'] ?>" required>
                                        <span class="error" id="displayErr"></span>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- </div> -->
                                <!-- <div class="block d-flex"> -->
                                <?php
                                if ($tableName == 'mobile' || $tableName == 'laptop' || $tableName == 'cpu') {
                                ?>
                                    <div class="flex">
                                        <div class="flex-container">
                                            <label class="txt1" for="">Ram</label>
                                            <div class="wrap-input validate-input">
                                                <input type="text" name="ram" id="ram" value="<?php echo $fetchQueryResult['ram'] ?>" required>
                                                <span class="error" id="ramErr"></span>
                                            </div>
                                        </div>
                                        <div class="flex-container">
                                            <label class="txt1" for="">Storage</label>
                                            <div class="wrap-input validate-input">
                                                <input type="text" name="rom" id="rom" value="<?php echo $fetchQueryResult['rom'] ?>" required>
                                                <span class="error" id="romErr"></span>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                                <!-- </div> -->
                                <div class="flex">
                                    <div class="flex-container">
                                        <label class="txt1" for="">price</label>
                                        <div class="wrap-input validate-input">
                                            <input type="number" name="price" id="price" value="<?php echo $fetchQueryResult['price'] ?>" required inputmode="numeric">
                                            <span class="error" id="priceErr"></span>
                                        </div>
                                    </div>
                                    <div class="flex-container">
                                        <label class="txt1" for="">Discount Price</label>
                                        <div class="wrap-input validate-input">
                                            <input type="number" name="dprice" id="dprice" value="<?php echo $fetchQueryResult['discount_price'] ?>" required inputmode="numeric">
                                            <span class="error" id="dpriceErr"></span>
                                        </div>
                                    </div>

                                </div>


                            
                                <div class="form-btn ">
                                    <button class="btn" type="submit" value="UPDATE">
                                        UPDATE
                                    </button>
                                </div>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>