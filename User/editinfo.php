<?php
session_start();
include_once 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST['name'];
    $mobile_no=$_POST['mobile'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $pin_code=$_POST['pin_code'];

    $u_id=$_SESSION['user_id'];
    $update ="UPDATE register SET `name`='$name' , `mobile_no` = '$mobile_no' , `email_id`='$email',`address`='$address',`city`='$city',`pin_code` = '$pin_code' WHERE `register`.`user_id` = $u_id ;";
    $result1=mysqli_query($conn,$update);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo"
        <script>
        alert('Update Successfully');
        setTimeout(function(){
            window.location.href='Account_info.php';
        },-30);
        </script>
        ";
    }else{
        echo"
        <script>
        alert('Update Failed');
        setTimeout(function(){
            window.location.href='Account_info.php';
        },-30);
        </script>
        ";
    }
    

}
?>