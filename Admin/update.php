<?php

include_once 'pages/connection.php';
$tableName=$_POST['tableName'];
if($tableName == "mobile"){
    $productId=$_POST['productId'];
    $brandName=$_POST['brandName'];
    $productName=$_POST['productName'];
    $quantity=$_POST['quantity'];
    $processor=$_POST['processor'];
    $display=$_POST['display'];
    $backCamera=$_POST['backCamera'];
    $frontCamera=$_POST['frontCamera'];
    $battery=$_POST['battery'];
    $image=$_FILES['image']['name'];
    $ram=$_POST['ram'];
    $rom=$_POST['rom'];
    $price=$_POST['price'];
    $dprice=$_POST['dprice'];
    if($image == ""){
        $updateQuery="UPDATE `mobile` SET `brand_name`='$brandName',`product_name`='$productName',`quantity`=$quantity,`processer`='$processor',`back_camera`='$backCamera',`front_camera`='$frontCamera',`battery`='$battery',`display`='$display',`ram`='$ram',`rom`='$rom',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
    $updateQueryResult=mysqli_query($conn,$updateQuery);
    }else
    {
        $new_name=uniqid("imgU-",true).$image;
        $image_tmp=$_FILES['image']['tmp_name'];
        $upload_dir="AddForm/product/Assets/uploadedImage/";
        $upload_dir2="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;
        $uploadImagePath2=$upload_dir2.$new_name;
        if(move_uploaded_file($image_tmp,$uploadImagePath)){
            $updateQuery="UPDATE `mobile` SET `brand_name`='$brandName',`product_name`='$productName',`image`='$uploadImagePath2',`quantity`=$quantity,`processer`='$processor',`back_camera`='$backCamera',`front_camera`='$frontCamera',`battery`='$battery',`display`='$display',`ram`='$ram',`rom`='$rom',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
            $updateQueryResult=mysqli_query($conn,$updateQuery);
        }
    }
}

if($tableName == "laptop"){
    $productId=$_POST['productId'];
    $brandName=$_POST['brandName'];
    $productName=$_POST['productName'];
    $quantity=$_POST['quantity'];
    $processor=$_POST['processor'];
    $display=$_POST['display'];
    $graphicsCard=$_POST['graphicsCard'];
    $frontCamera=$_POST['frontCamera'];
    $battery=$_POST['battery'];
    $image=$_FILES['image']['name'];
    $ram=$_POST['ram'];
    $rom=$_POST['rom'];
    $price=$_POST['price'];
    $dprice=$_POST['dprice'];

    if($image == ""){
        $updateQuery="UPDATE `laptop` SET `brand_name`='$brandName',`product_name`='$productName',`quantity`=$quantity,`processer`='$processor',`graphics_card`='$graphicsCard',`front_camera`='$frontCamera',`battery`='$battery',`display`='$display',`ram`='$ram',`rom`='$rom',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
    $updateQueryResult=mysqli_query($conn,$updateQuery);
    }else
    {
        $new_name=uniqid("imgU-",true).$image;
        $image_tmp=$_FILES['image']['tmp_name'];
        $upload_dir="AddForm/product/Assets/uploadedImage/";
        $upload_dir2="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;
        $uploadImagePath2=$upload_dir2.$new_name;
        if(move_uploaded_file($image_tmp,$uploadImagePath)){
            $updateQuery="UPDATE `laptop` SET `brand_name`='$brandName',`product_name`='$productName',`image`='$uploadImagePath2',`quantity`=$quantity,`processer`='$processor',`graphics_card`='$graphicsCard',`front_camera`='$frontCamera',`battery`='$battery',`display`='$display',`ram`='$ram',`rom`='$rom',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
            $updateQueryResult=mysqli_query($conn,$updateQuery);
        }
    }
}


if($tableName == "cpu"){
    $productId=$_POST['productId'];
    $brandName=$_POST['brandName'];
    $productName=$_POST['productName'];
    $quantity=$_POST['quantity'];
    $processor=$_POST['processor'];
    $graphicsCard=$_POST['graphicsCard'];
    $image=$_FILES['image']['name'];
    $ram=$_POST['ram'];
    $rom=$_POST['rom'];
    $price=$_POST['price'];
    $dprice=$_POST['dprice'];

    if($image == ""){
        $updateQuery="UPDATE `cpu` SET `brand_name`='$brandName',`product_name`='$productName',`quantity`=$quantity,`processer`='$processor',`graphics_card`='$graphicsCard',`ram`='$ram',`rom`='$rom',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
    $updateQueryResult=mysqli_query($conn,$updateQuery);
    }else
    {
        $new_name=uniqid("imgU-",true).$image;
        $image_tmp=$_FILES['image']['tmp_name'];
        $upload_dir="AddForm/product/Assets/uploadedImage/";
        $upload_dir2="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;
        $uploadImagePath2=$upload_dir2.$new_name;
        if(move_uploaded_file($image_tmp,$uploadImagePath)){
            $updateQuery="UPDATE `cpu` SET `brand_name`='$brandName',`product_name`='$productName',`image`='$uploadImagePath2',`quantity`=$quantity,`processer`='$processor',`graphics_card`='$graphicsCard',`ram`='$ram',`rom`='$rom',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
            $updateQueryResult=mysqli_query($conn,$updateQuery);
        }
    }
}


if($tableName == "wirelessaccessories"){
    $productId=$_POST['productId'];
    $brandName=$_POST['brandName'];
    $productName=$_POST['productName'];
    $productType=$_POST['type'];
    $quantity=$_POST['quantity'];
    $battery=$_POST['battery'];
    $playBack=$_POST['playBack'];
    $image=$_FILES['image']['name'];
    $price=$_POST['price'];
    $dprice=$_POST['dprice'];

    if($image == ""){
        $updateQuery="UPDATE `wirelessaccessories` SET `brand_name`='$brandName',`product_name`='$productName',`product_type`='$productType',`quantity`=$quantity,`battery`='$battery',`playback`='$playBack',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
    $updateQueryResult=mysqli_query($conn,$updateQuery);
    }else
    {
        $new_name=uniqid("imgU-",true).$image;
        $image_tmp=$_FILES['image']['tmp_name'];
        $upload_dir="AddForm/product/Assets/uploadedImage/";
        $upload_dir2="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;
        $uploadImagePath2=$upload_dir2.$new_name;
        if(move_uploaded_file($image_tmp,$uploadImagePath)){
            $updateQuery="UPDATE `wirelessaccessories` SET `brand_name`='$brandName',`product_name`='$productName',`product_type`='$productType',`image`='$uploadImagePath2',`quantity`=$quantity,`battery`='$battery',`playback`='$playBack',`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
            $updateQueryResult=mysqli_query($conn,$updateQuery);
        }
    }
}

if($tableName == "accessories"){
    $productId=$_POST['productId'];
    $brandName=$_POST['brandName'];
    $productName=$_POST['productName'];
    $productType=$_POST['type'];
    $quantity=$_POST['quantity'];
    $image=$_FILES['image']['name'];
    $price=$_POST['price'];
    $dprice=$_POST['dprice'];

    if($image == ""){
        $updateQuery="UPDATE `accessories` SET `brand_name`='$brandName',`product_name`='$productName',`product_type`='$productType',`quantity`=$quantity,`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
    $updateQueryResult=mysqli_query($conn,$updateQuery);
    }else
    {
        $new_name=uniqid("imgU-",true).$image;
        $image_tmp=$_FILES['image']['tmp_name'];
        $upload_dir="AddForm/product/Assets/uploadedImage/";
        $upload_dir2="Assets/uploadedImage/";
        $uploadImagePath=$upload_dir.$new_name;
        $uploadImagePath2=$upload_dir2.$new_name;
        if(move_uploaded_file($image_tmp,$uploadImagePath)){
            $updateQuery="UPDATE `accessories` SET `brand_name`='$brandName',`product_name`='$productName',`product_type`='$productType',`image`='$uploadImagePath2',`quantity`=$quantity,`price`=$price,`discount_price`=$dprice WHERE `product_id`=$productId";
            $updateQueryResult=mysqli_query($conn,$updateQuery);
        }
    }
}

header('Location:displayProduct.php?tableName='.$tableName);

?>