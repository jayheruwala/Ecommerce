<?php
include_once 'pages/connection.php';
if (!isset($_SESSION['adminId'])) {
    header('Location:Login/index.php');
} else {
    $adminId = $_SESSION['adminId'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<style>
    header{
        z-index:2;
    }
</style>

<body>

    <header>
        <div class="headContent">
            <div class="logo">
                <div class="sideOpen">
                    <button onclick="sideOpen()"><i class="icon_open bi-justify"></i></button>
                </div>
                <div id="logo"><a href="index.php" style="text-transform:Uppercase;">Electro.</a></div>
            </div>
            <div class="profile">
                <div class="profile_icon">
                    <?php
                    if (!isset($_SESSION['adminId'])) {
                    ?>
                        <i class="bi-person"></i>
                    <?php
                   
                    } else {
                        $userXX = mysqli_query($conn,"SELECT * FROM `admin` WHERE `admin_id`=$adminId");
                        $fetchUserXX = mysqli_fetch_assoc($userXX);
                    ?>
                        <img src="Login/<?php echo $fetchUserXX['image'] ?>">
                        <button>Hi ,&nbsp;<?php echo $fetchUserXX['fname'] ?></button>
                    <?php
                    }
                    ?>
                    <div class="profile_block">
                        <p><a href="pages/logout.php"> <i class="icon bi bi-box-arrow-in-right"></i> Log Out</a></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="sidebar " id="sidebar">
        <div class="main_menu">

            <div class="close">
                <ul>
                    <li style="text-align: end;"><button onclick="sideClose()"><i class="icon_close bi-x-lg"></i></button></li>
                </ul>
            </div>
            <ul>
                <li class="list_menu"><a href="index.php"> <i class="icon bi-house-door"></i> DeshBoard</a></li>
                <li class="list_menu"><a href="customer.php"> <i class="icon bi-person"></i> Customer</a></li>
                <div class="dropdown">
                    <li style="margin-bottom: 5px;"><i class="icon bi-list-ul"></i> Products</li>
                    <?php
                    $category = "SELECT * FROM categories_info ORDER BY `category_name` ASC";
                    $categoryQuery = mysqli_query($conn, $category);
                    if ($categoryQuery == true) {
                        while ($fetchCategory = mysqli_fetch_assoc($categoryQuery)) {
                    ?>
                            <ul>
                                <li class="list_menu drop">
                                    <a href="displayProduct.php?tableName=<?php echo $fetchCategory['category_name'] ?> " class="" ><?php echo $fetchCategory['category_name'] ?></a>
                                </li>
                            </ul>
                    <?php
                        }
                    }
                    ?>
                </div>

                <li class="list_menu"><a href="AddForm/product/product.php"> <i class="icon bi-server"></i> Add-Product</a></li>
                <li class="list_menu"><a href="orders.php"><i class="icon bi-box-seam"></i> Orders</a></li>
            </ul>
        </div>
        <div class="last">
            <ul>
                <li class="list_menu"><a href="pages/logout.php"><i class="icon bi-box-arrow-in-right"></i> Log Out</a></li>
            </ul>
        </div>
    </div>



    <script>
        function sideOpen() {
            var sideOpn = document.getElementById("sidebar");
            sideOpn.classList.add("sideWidth");
        }

        function sideClose() {
            var sideOpn = document.getElementById("sidebar");
            sideOpn.classList.remove("sideWidth");
        }
    </script>
</body>

</html>