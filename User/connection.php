<?php
$conn = mysqli_connect('localhost','root','','ecommerce');
if(!$conn){
    die("Error : " . mysqli_connect_error());
}
?>