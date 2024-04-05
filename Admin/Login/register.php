<?php
include_once "../pages/connection.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['sign_in'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $position = $_POST['position'];
        $image = $_FILES['image']['name'];
        $password = $_POST['pass'];

        

        $new_name = uniqid("img-",true).$image;
        $image_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = "profileImage/";
        
        $uploadImagePath = $upload_dir.$new_name;
        $hashPassword = password_hash($password,PASSWORD_DEFAULT);

    
        if(move_uploaded_file($image_tmp,$uploadImagePath)){
            $query = "INSERT INTO `admin`(`fname`,`lname`,`email_id`,`mobile_no`,`image`,`position`,`password`) VALUES('$fname','$lname','$email',$mobile,'$uploadImagePath','$position','$hashPassword')";
            $queryResult = mysqli_query($conn,$query);
            
        
            if($queryResult == true){
                $checkValidX = "SELECT * FROM `admin` WHERE `email_id` = '$email'";
                $checkValidXResult = mysqli_query($conn,$checkValidX);
                if(mysqli_num_rows($checkValidXResult) > 0){
                    $fetch = mysqli_fetch_assoc($checkValidXResult);
                    $passwordX = $fetch['password'];
                    $verify = password_verify($password,$passwordX);
                    if($verify){
                        $admin_id = $fetch['admin_id'];
                        $_SESSION['adminId'] = $admin_id;
                        header('Location:../index.php');
                    }
                }
            }
        }
    }
}

?>