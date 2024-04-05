
<?php
session_start();
include_once '../../connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST['name'];
$mobile_no=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$pin_code=$_POST['pin_code'];
$password=$_POST['password'];
$find_user_id="SELECT MAX(user_id),mobile_no,email_id FROM register;";
$result_user_id=mysqli_query($conn,$find_user_id);
if(mysqli_num_rows($result_user_id) == 1){
$row_user_i=mysqli_fetch_array($result_user_id);
$user_id=$row_user_i[0]+1;
echo $row_user_i[1];
}
else{
$user_id=1;
}
$query="INSERT INTO register (user_id,`name`,mobile_no,`email_id`,`address`,`city`,pin_code,`password`) VALUES ($user_id,'$name',$mobile_no,'$email','$address','$city',$pin_code,'$password');";
if($insert_query=mysqli_query($conn,$query)==true){
  $_SESSION["user_id"]=$user_id;
  header("location:../../index.php");
}else{
    echo"Error".mysqli_error($conn);
}
}
?>