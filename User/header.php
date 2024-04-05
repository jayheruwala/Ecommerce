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
</head>
<style>
</style>
<link rel="stylesheet" href="Assets/css/header.css">

<body>
    <header>
        <div id="header_top">
            <div id="logo">
                <h2> <a href="index.php"> ELECTRO.</a></h2>
            </div>
            <div id="search_ba">
                <div class="cat_grop">
                    <div id="drp_nme">
                        <div id="drp_nmeo">
                            All Category
                            <img src="Assets/img/down-filled-triangular-arrow.png" alt="">
                        </div>
                        <ul>
                            <?php
                            $findcategory = "SELECT * from `categories_info` ORDER BY category_name ASC";
                            $findcategoryResult = mysqli_query($conn,$findcategory);
                            if(mysqli_num_rows($findcategoryResult)){
                                while($fetchCategories = mysqli_fetch_assoc($findcategoryResult)){
                                    ?>
                                    <li><a href="category.php?categoryName=<?php echo $fetchCategories['category_name'] ?>&categotyId=<?php echo $fetchCategories['category_id'] ?>"><?php echo $fetchCategories['category_name'] ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                         
                        </ul>
                    </div>
                </div>
                <div class="form_grop">
                <form action="search.php" method="POST">
                        <input type="search" name="search" id="srch" placeholder="I'm searching for...">
                        <button><img src="Assets/img/search.png" alt=""></button>
                    </form>
                </div>
            </div>
            <div id="group_page">
                <div class="bnt_gr">
                    <div class="profile_button">
                        <div class="bnt_imgs">
                            <a href=""> <img src="Assets/img/f_user.png" alt=""></a>
                        </div>
                        <div class="profile_button_list">
                            <ul>
                               <?php
                               if(!isset($_SESSION['user_id'])){
                               ?>
                                    <li><a href="form/registration/registrationform.html">Register</a></li>
                                    <li><a href="form/login/form.php">Login</a></li>
                                    <li><a href="../Admin/Login/index.php">Admin</a></li>
                                <?php
                               }else{
                                   ?>    
                                    <li><a href="Account_info.php">Edit</a></li>
                                    <li><a href="YourOrders.php">Orders</a></li>
                                    <li><a href="Assets/logout.php">Log Out</a></li>
                                    <?php
                               }
                                    ?>
                                   
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="bnt_gr">
                    <div class="bnt_imgs">
                        <a href=""> <img src="Assets/img/f_wishlist.png" alt=""></a>
                    </div>
                </div> -->
                <div class="bnt_gr" id="Ad_crt_to">
                    <div class="bnt_imgs">
                        <a href="cart.php"> <img src="Assets/img/f_cart.png" alt=""></a>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <nav>
        <div class="navbar">
            <div class="nav_catagory">
                <div class="browse_catagory_group">
                    <div class="browse_catagory">
                        <img src="Assets/img/menu2.jpeg" alt="">
                        <h3>Browse Categories
                        </h3>
                    </div>
                    <ul class="vertical_menu">
                    <?php
                            $findcategory = "SELECT * from `categories_info` ORDER BY category_name ASC";
                            $findcategoryResult = mysqli_query($conn,$findcategory);
                            if(mysqli_num_rows($findcategoryResult)){
                                while($fetchCategories = mysqli_fetch_assoc($findcategoryResult)){
                                    ?>
                                    <li><a href="category.php?categoryName=<?php echo $fetchCategories['category_name'] ?>&categotyId=<?php echo $fetchCategories['category_id'] ?>"><?php echo $fetchCategories['category_name'] ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                      
                    </ul>
                </div>

                <div class="nav_links">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">Shop</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="#MyFoot">Contact</a></li>
                        <li><a href="" >Venders</a></li>
                        <li><a href="">Compare</a></li>
                    </ul>
                </div>
            </div>
            <div class="free_shiping">
                <span class="text" style=" display: flex; justify-content:
                        end;
                        align-items: center; gap: 5px; text-transform:
                        uppercase; ">
                    <img src="Assets/img/online-shopping2.png" alt="">
                    Free Shipping
                </span>
            </div>
        </div>
    </nav>