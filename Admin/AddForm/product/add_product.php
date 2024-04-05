<?php

include_once'connection.php';
if(isset($_POST))
{
    $category=strtolower($_POST['category']);

    $findCategoryId="SELECT * FROM categories_info where category_name='$category'";
    $findCategoryResult=mysqli_query($conn,$findCategoryId);

    $row=mysqli_fetch_array($findCategoryResult);
    $categoryId=$row['category_id'];

    if($category == "mobile")
    {
        $brandName=$_POST['brandName'];
        $productName=$_POST['productName'];
        $image=$_FILES['productImage']['name'];
        $quantity=$_POST['quantity'];
        $processer=$_POST['processor'];
        $backCamera=$_POST['backCamera'];
        $frontCamera=$_POST['frontCamera'];
        $battery=$_POST['battery'];
        $display=$_POST['display'];
        $ram=$_POST['ram'];
        $rom=$_POST['rom'];
        $price=$_POST['price'];
        $discount_price=$_POST['discountPrice'];

        $new_name=uniqid("img-",true).$image;

        $image_tmp=$_FILES['productImage']['tmp_name'];
        $upload_dir="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;

        if(move_uploaded_file($image_tmp,$uploadImagePath))
        {

            $insert_query="INSERT INTO `mobile` (`category_id`, `brand_name`, `product_name`, `image`, `quantity`, `processer`, `back_camera`, `front_camera`, `battery`, `display`, `ram`, `rom`, `price`, `discount_price`) VALUES ($categoryId,'$brandName','$productName','$uploadImagePath',$quantity,'$processer','$backCamera','$frontCamera','$battery','$display','$ram','$rom',$price,$discount_price)";

            if($conn->query($insert_query) === true){
                echo "Data Inserted sSuccessfully";
            }else{
                echo "Error :".mysqli_error($conn);
            }
        }
    }
    if($category == "laptop")
    {
        $brandName=$_POST['brandName'];
        $productName=$_POST['productName'];
        $image=$_FILES['productImage']['name'];
        $quantity=$_POST['quantity'];
        $processer=$_POST['processor'];
        $graphicsCard=$_POST['graphicsCard'];
        $frontCamera=$_POST['frontCamera'];
        $battery=$_POST['battery'];
        $display=$_POST['display'];
        $ram=$_POST['ram'];
        $rom=$_POST['rom'];
        $price=$_POST['price'];
        $discount_price=$_POST['discountPrice'];

        $new_name=uniqid("img-",true).$image;

        $image_tmp=$_FILES['productImage']['tmp_name'];
        $upload_dir="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;

        if(move_uploaded_file($image_tmp,$uploadImagePath))
        {
            $insert_query="INSERT INTO `laptop` (`category_id`, `brand_name`, `product_name`, `image`, `quantity`, `processer`, `graphics_card`, `front_camera`, `battery`, `display`, `ram`, `rom`, `price`, `discount_price`) VALUES ($categoryId,'$brandName','$productName','$uploadImagePath',$quantity,'$processer','$graphicsCard','$frontCamera','$battery','$display','$ram','$rom',$price,$discount_price)";

            // $insert_query="INSERT INTO 'laptop' ('category_id','brand_name','product_name',`image`,`quantity`,`processer`,`graphics_card`,`front_camera`,`battery`,`display`,`ram`,`rom`,price,discount_price) values ($categoryId,'$brandName','$productName','$uploadImagePath',$quantity,'$processer','$graphicsCard','$frontCamera','$battery','$display','$ram','$rom',$price,$discount_price)";
            if($conn->query($insert_query) === true){
                echo "Data Inserted sSuccessfully";
            }else{
                echo "Error :".mysqli_error($conn);
            }
        }
    }
    if($category == "cpu")
    {
        $brandName=$_POST['brandName'];
        $productName=$_POST['productName'];
        $image=$_FILES['productImage']['name'];
        $quantity=$_POST['quantity'];
        $processer=$_POST['processor'];
        $graphicsCard=$_POST['graphicsCard'];
        $ram=$_POST['ram'];
        $rom=$_POST['rom'];
        $price=$_POST['price'];
        $discount_price=$_POST['discountPrice'];

        $new_name=uniqid("img-",true).$image;

        $image_tmp=$_FILES['productImage']['tmp_name'];
        $upload_dir="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;

        if(move_uploaded_file($image_tmp,$uploadImagePath))
        {
            $insert_query="INSERT INTO `cpu` (`category_id`,`brand_name`,`product_name`,`image`,quantity,`processer`,`graphics_card`,`ram`,`rom`,price,discount_price) values ($categoryId,'$brandName','$productName','$uploadImagePath',$quantity,'$processer','$graphicsCard','$ram','$rom',$price,$discount_price)";
            if($conn->query($insert_query) === true){
                echo "Data Inserted sSuccessfully";
            }else{
                echo "Error :".mysqli_error($conn);
            }
        }
    }
    if($category == "wirelessaccessories")
    {
        $brandName=$_POST['brandName'];
        $productName=$_POST['productName'];
        $productType=$_POST['productType'];
        $image=$_FILES['productImage']['name'];
        $quantity=$_POST['quantity'];
        $battery=$_POST['battery'];
        $playback=$_POST['playback'];
        $price=$_POST['price'];
        $discount_price=$_POST['discountPrice'];

        $new_name=uniqid("img-",true).$image;

        $image_tmp=$_FILES['productImage']['tmp_name'];
        $upload_dir="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;

        if(move_uploaded_file($image_tmp,$uploadImagePath))
        {
            $insert_query ="INSERT INTO `wirelessaccessories`(`category_id`, `brand_name`, `product_name`, `product_type`, `image`, quantity, `battery`, `playback`, price, discount_price) VALUES ($categoryId,'$brandName','$productName','$productType','$uploadImagePath',$quantity,'$battery','$playback',$price,$discount_price)";
            if($conn->query($insert_query) === true){
                echo "Data Inserted sSuccessfully";
            }else{
                echo "Error :".mysqli_error($conn);
            }
        }
    }
    if($category == "accessories")
    {
        $brandName=$_POST['brandName'];
        $productName=$_POST['productName'];
        $productType=$_POST['productType'];
        $image=$_FILES['productImage']['name'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $discount_price=$_POST['discountPrice'];

        $new_name=uniqid("img-",true).$image;

        $image_tmp=$_FILES['productImage']['tmp_name'];
        $upload_dir="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;

        if(move_uploaded_file($image_tmp,$uploadImagePath))
        {
            $insert_query="INSERT INTO `accessories` (`category_id`,`brand_name`,`product_name`,`product_type`,`image`,quantity,price,discount_price) values ($categoryId,'$brandName','$productName','$productType','$uploadImagePath',$quantity,$price,$discount_price)";
            if($conn->query($insert_query) === true){
                echo "Data Inserted sSuccessfully";
            }else{
                echo "Error :".mysqli_error($conn);
            }
        }
    }
}
header('Location:product.php');
?>