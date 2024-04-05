<?php
$conn = mysqli_connect('localhost','root','','ecommerce');
if(!$conn){
    die("connection falid" . mysqli_connect_error());
}
?>