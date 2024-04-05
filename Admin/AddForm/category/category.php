<?php
include_once 'connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $image=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];
    $new_name=uniqid("img-",true).$image;
    $upload_dir="Assets/upload_image";
    $image_store_path=$upload_dir.$new_name;
    if(move_uploaded_file($image_tmp,$image_store_path)){
        $addCategoryQuery="INSERT INTO `categories_info`(`category_name`,`image`) VALUES ('$name','$image_store_path')";
    $categoryResult=mysqli_query($conn,$addCategoryQuery);
        if($categoryResult == true){
            echo"Success";
         }   
         else{
        echo"Error :".mysqli_error($conn);

        }
    }
}
?>
