<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/style2.css">
</head>

<body>
    <?php
    include_once 'header.php';
    ?>
    <main>
        <?php

        if (isset($_POST)) {
            if (!$_POST) {
            } else {
                $search_item = $_POST['search'];
                if ($search_item == "") {
                    //header("Location:index.php");
                    echo "<script>window.location.href='index.php' </script";
                }
                $categoryQuery = "select * from categories_info";
                $categoryQueryResult = mysqli_query($conn, $categoryQuery);
                if (mysqli_num_rows($categoryQueryResult) > 0) {
                    while ($fetchCategoryQueryResult = mysqli_fetch_assoc($categoryQueryResult)) {
                        $tableName = $fetchCategoryQueryResult['category_name'];

                        //    $displayProduct = "SELECT * FROM $tableName where `brand_name`='$search_item'";
                        if ($tableName == $search_item) {
                            $displayProduct = "SELECT * FROM $tableName";
                        } else if ($tableName == "accessories" || $tableName == "wirelessaccessories") {
                            $displayProduct = "SELECT * FROM $tableName where `brand_name` LiKE '$search_item%' || `product_name` LIKE '$search_item%' || `product_type` LIKE '$search_item%'";
                        } else {
                            $displayProduct = "SELECT * FROM $tableName where `brand_name` LiKE '$search_item%'  || `product_name` LIKE '$search_item%'";
                        }
                        $displayProductResult = mysqli_query($conn, $displayProduct);
                        if (mysqli_num_rows($displayProductResult) > 0) {
        ?>

                            <div class="product_container">
                                <?php
                                while ($fetchDisplayDataQueryResult = mysqli_fetch_assoc($displayProductResult)) {
                                    $productId = $fetchDisplayDataQueryResult['product_id'];
                                ?>
                                    <div class="product">
                                        <div class="product_img">
                                            <img src="../Admin/AddForm/product/<?php echo $fetchDisplayDataQueryResult['image'] ?>" alt="">
                                        </div>
                                        <div class="product_detail">
                                            <div class="product_name">
                                                <p class="brand_name"><?php echo $fetchDisplayDataQueryResult['brand_name'] ?></p>
                                                <p class="product_name"><?php echo $fetchDisplayDataQueryResult['product_name'] ?></p>
                                            </div>
                                            <?php
                                            $priceProduct = $fetchDisplayDataQueryResult['discount_price'];
                                            ?>
                                            <div class="product_price">
                                                <p>₹<?php echo $fetchDisplayDataQueryResult['discount_price'] ?><del>₹<?php echo $fetchDisplayDataQueryResult['price'] ?></del></p>
                                            </div>
                                            <div class="product_det">
                                                <?php
                                                if ($tableName == 'mobile') {
                                                ?>
                                                    <div class="box">Processer:<?php echo $fetchDisplayDataQueryResult['processer'] ?></div>
                                                    <div class="box">Battery:<?php echo $fetchDisplayDataQueryResult['battery'] ?></div>
                                                    <div class="box">Ram:<?php echo $fetchDisplayDataQueryResult['ram'] ?></div>
                                                    <div class="box">Storage:<?php echo $fetchDisplayDataQueryResult['rom'] ?></div>
                                                    <div class="box">Display:<?php echo $fetchDisplayDataQueryResult['display'] ?></div>
                                                    <div class="box">Front Camera:<?php echo $fetchDisplayDataQueryResult['front_camera'] ?></div>
                                                    <div class="box">Back Camera:<?php echo $fetchDisplayDataQueryResult['back_camera'] ?></div>
                                                <?php
                                                }

                                                ?>

                                                <?php
                                                if ($tableName == 'laptop') {
                                                ?>
                                                    <div class="box">Processer:<?php echo $fetchDisplayDataQueryResult['processer'] ?></div>
                                                    <div class="box">Battery:<?php echo $fetchDisplayDataQueryResult['battery'] ?></div>
                                                    <div class="box">Ram:<?php echo $fetchDisplayDataQueryResult['ram'] ?></div>
                                                    <div class="box">Storage:<?php echo $fetchDisplayDataQueryResult['rom'] ?></div>
                                                    <div class="box">Display:<?php echo $fetchDisplayDataQueryResult['display'] ?></div>
                                                    <div class="box">Front Camera:<?php echo $fetchDisplayDataQueryResult['front_camera'] ?></div>
                                                    <div class="box">Graphics card:<?php echo $fetchDisplayDataQueryResult['graphics_card'] ?></div>
                                                <?php
                                                }

                                                ?>

                                                <?php
                                                if ($tableName == 'cpu') {
                                                ?>
                                                    <div class="box">Processer:<?php echo $fetchDisplayDataQueryResult['processer'] ?></div>
                                                    <div class="box">Ram:<?php echo $fetchDisplayDataQueryResult['ram'] ?></div>
                                                    <div class="box">Storage:<?php echo $fetchDisplayDataQueryResult['rom'] ?></div>
                                                    <div class="box">Graphics card:<?php echo $fetchDisplayDataQueryResult['graphics_card'] ?></div>
                                                <?php
                                                }

                                                ?>

                                                <?php
                                                if ($tableName == 'accessories') {
                                                ?>
                                                <?php

                                                }

                                                ?>

                                                <?php
                                                if ($tableName == 'wirelessaccessories') {
                                                ?>
                                                    <div class="box">Battery:<?php echo $fetchDisplayDataQueryResult['battery'] ?></div>
                                                    <div class="box">PlayBack Time:<?php echo $fetchDisplayDataQueryResult['playback'] ?></div>
                                                <?php
                                                }

                                                ?>

                                            </div>
                                            <div class="product_buttons">
                                                <?php
                                                if (!isset($_SESSION['user_id'])) {
                                                ?>
                                                    <button id="stop" onclick="go_cart()" class="cert_bn2 cert_x">Add To Cart</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button data-price="<?php echo $priceProduct ?>" data-tableName="<?php echo $tableName; ?>" data-id="<?php echo $productId; ?>" class="cert_bnt cert_x">Add To Cart</button>
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
                            </div>
                <?php
                        }
                    }
                }
                ?>


        <?php
            }
        }
        ?>
    </main>
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>