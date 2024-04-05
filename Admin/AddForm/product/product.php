<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="Assets/css/product.css">
<body>
    <div class="wrapper">
        <div class="title">Add Product</div>
        <div class="field">
            <label for="">Select Category</label>
            <select id="formSelector" onchange="showForm()">
                <option value="">--select Category</option>
                <?php
                    $query = "SELECT * FROM `categories_info`";
                    $query_result = mysqli_query($conn,$query);

                    if(mysqli_num_rows($query_result) > 0){
                        while($fetch_row = mysqli_fetch_assoc($query_result)){
                            ?>
                            <option value="<?php echo $fetch_row['category_name']?>">
                                <?php echo $fetch_row['category_name'] ?>
                            </option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
        <div id="mobile" class="form_container">
            <form onsubmit="return validateMobile()" action="add_product.php" method="POST" enctype="multipart/form-data">
                    <input type="" value="Mobile" name="category" style="display:none;">
                    
                    <div class="field">
                        <label for="">Brand Name</label>
                        <div class="input-area">
                            <input type="text" name="brandName" id="mbrandName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="mbrandErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Product Name</label>
                        <div class="input-area">
                            <input type="text" name="productName" id="mName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="mNameErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Product Image</label>
                        <div class="input-area">
                            <input type="file" name="productImage" id="mimage" multiple>
                        </div>
                        <div class="error" id="mimageErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Quantity</label>
                        <div class="input-area">
                            <input type="text" name="quantity" id="mquantity" placeholder="Enter Quantity">
                        </div>
                        <div class="error" id="mquantityErr"></div>
                    </div>

                    <div class="field">
                        <label for="">Processor</label>
                        <div class="input-area">
                            <input type="text" name="processor" id="mprocessor" placeholder="Enter Processor Name">
                        </div>
                        <div class="error" id="mprocessorErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Back Camera</label>
                        <div class="input-area">
                            <input type="text" name="backCamera" id="mbackCamera" placeholder="Enter Back Camera">
                        </div>
                        <div class="error" id="mbackCameraErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Front Camera</label>
                        <div class="input-area">
                            <input type="text" name="frontCamera" id="mfrontCamera" placeholder="Enter Front Camera">
                        </div>
                        <div class="error" id="mfrontCameraErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Battery</label>
                        <div class="input-area">
                            <input type="text" name="battery" id="mbattery" placeholder="Enter Battery Size ">
                        </div>
                        <div class="error" id="mbatteryErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Display</label>
                        <div class="input-area">
                            <input type="text" name="display" id="mdisplay" placeholder="Enter Display size and Type ">
                        </div>
                        <div class="error" id="mdisplayErr"></div>
                    </div>
                    <div class="field">
                        <label for="">RAM</label>
                        <div class="input-area">
                            <input type="text" name="ram" id="mram" placeholder="Enter RAM Size(GB)">
                        </div>
                        <div class="error" id="mramErr"></div>
                    </div>
                    <div class="field">
                        <label for="">ROM</label>
                        <div class="input-area">
                            <input type="text" name="rom" id="mrom" placeholder="Enter ROM Size(GB) ">
                        </div>
                        <div class="error" id="mromErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Price</label>
                        <div class="input-area">
                            <input type="text" name="price" id="mprice" placeholder="Enter Price(Before Discount)">
                        </div>
                        <div class="error" id="mpriceErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Discount Price</label>
                        <div class="input-area">
                            <input type="text" name="discountPrice" id="mdiscountPrice" placeholder="Enter Price(After Discount)">
                        </div>
                        <div class="error" id="mdiscountPriceErr"></div>
                    </div>
                    <input type="submit" value="Add Product">


            </form>
        </div>
        <div id="laptop" class="form_container">
            <form onsubmit="return validateLaptop()" action="add_product.php" method="POST" enctype="multipart/form-data">
                    <input type="" value="Laptop" name="category" style="display:none;">
                    
                    <div class="field">
                        <label for="">Brand Name</label>
                        <div class="input-area">
                            <input type="text" name="brandName" id="lbrandName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="lbrandErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Product Name</label>
                        <div class="input-area">
                            <input type="text" name="productName" id="lName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="lNameErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Product Image</label>
                        <div class="input-area">
                            <input type="file" name="productImage" id="limage" multiple>
                        </div>
                        <div class="error" id="limageErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Quantity</label>
                        <div class="input-area">
                            <input type="text" name="quantity" id="lquantity" placeholder="Enter Quantity">
                        </div>
                        <div class="error" id="lquantityErr"></div>
                    </div>

                    <div class="field">
                        <label for="">Processor</label>
                        <div class="input-area">
                            <input type="text" name="processor" id="lprocessor" placeholder="Enter Processor Name">
                        </div>
                        <div class="error" id="lprocessorErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Graphics Card</label>
                        <div class="input-area">
                            <input type="text" name="graphicsCard" id="lgraphicsCard" placeholder="Enter Graphics Card">
                        </div> 
                        <div class="error" id="lgraphicsCardErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Front Camera</label>
                        <div class="input-area">
                            <input type="text" name="frontCamera" id="lfrontCamera" placeholder="Enter Front Camera">
                        </div>
                        <div class="error" id="lfrontCameraErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Battery</label>
                        <div class="input-area">
                            <input type="text" name="battery" id="lbattery" placeholder="Enter Battery Size ">
                        </div>
                        <div class="error" id="lbatteryErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Display</label>
                        <div class="input-area">
                            <input type="text" name="display" id="ldisplay" placeholder="Enter Display size and Type ">
                        </div>
                        <div class="error" id="ldisplayErr"></div>
                    </div>
                    <div class="field">
                        <label for="">RAM</label>
                        <div class="input-area">
                            <input type="text" name="ram" id="lram" placeholder="Enter RAM Size(GB)">
                        </div>
                        <div class="error" id="lramErr"></div>
                    </div>
                    <div class="field">
                        <label for="">ROM</label>
                        <div class="input-area">
                            <input type="text" name="rom" id="lrom" placeholder="Enter ROM Size(GB) ">
                        </div>
                        <div class="error" id="lromErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Price</label>
                        <div class="input-area">
                            <input type="text" name="price" id="lprice" placeholder="Enter Price(Before Discount)">
                        </div>
                        <div class="error" id="lpriceErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Discount Price</label>
                        <div class="input-area">
                            <input type="text" name="discountPrice" id="ldiscountPrice" placeholder="Enter Price(After Discount)">
                        </div>
                        <div class="error" id="ldiscountPriceErr"></div>
                    </div>
                    <input type="submit" value="Add Product">


            </form>
        </div>
        <div id="accessories" class="form_container">
            <form onsubmit="return validateAccessories1()" action="add_product.php" method="POST" enctype="multipart/form-data">
                    <input type="" value="accessories" name="category" style="display:none;">
                    
                    <div class="field">
                        <label for="">Brand Name</label>
                        <div class="input-area">
                            <input type="text" name="brandName" id="a1brandName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="a1brandErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Product Name</label>
                        <div class="input-area">
                            <input type="text" name="productName" id="a1Name" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="a1NameErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Product Type</label>
                        <div class="input-area">
                            <input type="text" name="productType" id="a1type" placeholder="Enter Product Type">
                        </div>
                        <div class="error" id="a1typeErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Product Image</label>
                        <div class="input-area">
                            <input type="file" name="productImage" id="a1image" multiple>
                        </div>
                        <div class="error" id="a1imageErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Quantity</label>
                        <div class="input-area">
                            <input type="text" name="quantity" id="a1quantity" placeholder="Enter Quantity">
                        </div>
                        <div class="error" id="a1quantityErr"></div>
                    </div>

                   
                    <div class="field">
                        <label for="">Price</label>
                        <div class="input-area">
                            <input type="text" name="price" id="a1price" placeholder="Enter Price(Before Discount)">
                        </div>
                        <div class="error" id="a1priceErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Discount Price</label>
                        <div class="input-area">
                            <input type="text" name="discountPrice" id="a1discountPrice" placeholder="Enter Price(After Discount)">
                        </div>
                        <div class="error" id="a1discountPriceErr"></div>
                    </div>
                    <input type="submit" value="Add Product">


            </form>
        </div>
        <div id="wirelessaccessories" class="form_container">
            <form onsubmit="return validateAccessories()" action="add_product.php" method="POST" enctype="multipart/form-data">
                    <input type="" value="wirelessaccessories" name="category" style="display:none;">
                    
                    <div class="field">
                        <label for="">Brand Name</label>
                        <div class="input-area">
                            <input type="text" name="brandName" id="abrandName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="abrandErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Product Name</label>
                        <div class="input-area">
                            <input type="text" name="productName" id="aName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="aNameErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Product Type</label>
                        <div class="input-area">
                            <input type="text" name="productType" id="atype" placeholder="Enter Product Type">
                        </div>
                        <div class="error" id="atypeErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Product Image</label>
                        <div class="input-area">
                            <input type="file" name="productImage" id="aimage" multiple>
                        </div>
                        <div class="error" id="aimageErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Quantity</label>
                        <div class="input-area">
                            <input type="text" name="quantity" id="aquantity" placeholder="Enter Quantity">
                        </div>
                        <div class="error" id="aquantityErr"></div>
                    </div>

                    
                   
                    <div class="field">
                        <label for="">Battery</label>
                        <div class="input-area">
                            <input type="text" name="battery" id="abattery" placeholder="Enter Battery Size ">
                        </div>
                        <div class="error" id="abatteryErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Playback Time</label>
                        <div class="input-area">
                            <input type="text" name="playback" id="aplayBack" placeholder="Enter Play Back Time ">
                        </div>
                        <div class="error" id="aplayBackErr"></div>
                    </div>
                   
                   
                    <div class="field">
                        <label for="">Price</label>
                        <div class="input-area">
                            <input type="text" name="price" id="aprice" placeholder="Enter Price(Before Discount)">
                        </div>
                        <div class="error" id="apriceErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Discount Price</label>
                        <div class="input-area">
                            <input type="text" name="discountPrice" id="adiscountPrice" placeholder="Enter Price(After Discount)">
                        </div>
                        <div class="error" id="adiscountPriceErr"></div>
                    </div>
                    <input type="submit" value="Add Product">
            </form>
        </div>
        <div id="cpu" class="form_container">
            <form onsubmit="return validateCpu()" action="add_product.php" method="POST" enctype="multipart/form-data">
                    <input type="" value="Cpu" name="category" style="display:none;">
                    
                    <div class="field">
                        <label for="">Brand Name</label>
                        <div class="input-area">
                            <input type="text" name="brandName" id="cbrandName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="cbrandErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Product Name</label>
                        <div class="input-area">
                            <input type="text" name="productName" id="cName" placeholder="Enter Brand Name">
                        </div>
                        <div class="error" id="cNameErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Product Image</label>
                        <div class="input-area">
                            <input type="file" name="productImage" id="cimage" multiple>
                        </div>
                        <div class="error" id="cimageErr"></div>
                    </div>
                    
                    <div class="field">
                        <label for="">Quantity</label>
                        <div class="input-area">
                            <input type="text" name="quantity" id="cquantity" placeholder="Enter Quantity">
                        </div>
                        <div class="error" id="cquantityErr"></div>
                    </div>

                    <div class="field">
                        <label for="">Processor</label>
                        <div class="input-area">
                            <input type="text" name="processor" id="cprocessor" placeholder="Enter Processor Name">
                        </div>
                        <div class="error" id="cprocessorErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Graphics Card</label>
                        <div class="input-area">
                            <input type="text" name="graphicsCard" id="cgraphicsCard" placeholder="Enter Graphics Card">
                        </div>
                        <div class="error" id="cgraphicsCardErr"></div>
                    </div>
                    
                   
                    <div class="field">
                        <label for="">RAM</label>
                        <div class="input-area">
                            <input type="text" name="ram" id="cram" placeholder="Enter RAM Size(GB)">
                        </div>
                        <div class="error" id="cramErr"></div>
                    </div>
                    <div class="field">
                        <label for="">ROM</label>
                        <div class="input-area">
                            <input type="text" name="rom" id="crom" placeholder="Enter ROM Size(GB) ">
                        </div>
                        <div class="error" id="cromErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Price</label>
                        <div class="input-area">
                            <input type="text" name="price" id="cprice" placeholder="Enter Price(Before Discount)">
                        </div>
                        <div class="error" id="cpriceErr"></div>
                    </div>
                    <div class="field">
                        <label for="">Discount Price</label>
                        <div class="input-area">
                            <input type="text" name="discountPrice" id="cdiscountPrice" placeholder="Enter Price(After Discount)">
                        </div>
                        <div class="error" id="cdiscountPriceErr"></div>
                    </div>
                    <input type="submit" value="Add Product">


            </form>
        </div>
    </div>
    <script src="Assets/js/product.js"></script>
</body>
</html>