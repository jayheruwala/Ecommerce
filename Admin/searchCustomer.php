<?php

include_once 'pages/connection.php';

if($_GET['name'] == ""){
    $user = "SELECT * FROM `register` ORDER BY user_id ASC";
}else{
    $name = $_GET['name'];
    $searchMethod = $_GET['searchMethod'] ;
    if($searchMethod == ""){
        $user = "SELECT * FROM `register` WHERE name LIKE '$name%' || user_id LIKE '$name%' ";

    }
    
    if($searchMethod == "name"){
        $user = "SELECT * FROM `register` WHERE name LIKE '$name%'";
        
    }
    if($searchMethod == "user_id"){
        $user = "SELECT * FROM `register` WHERE user_id LIKE '$name%'";

    }
    if($searchMethod == "email_id"){
        $user = "SELECT * FROM `register` WHERE email_id LIKE '$name%'";

    }
    if($searchMethod == "mobile_no"){
        $user = "SELECT * FROM `register` WHERE mobile_no LIKE '$name%'";

    }
    if($searchMethod == "pin_code"){
        $user = "SELECT * FROM `register` WHERE pin_code LIKE '$name%'";

    }


}
$userQueryResult=mysqli_query($conn,$user);
while($fetch = mysqli_fetch_assoc($userQueryResult)){
    $data="<tr><td>". $fetch['user_id'] . "</td><td>". $fetch['name'] . "</td><td>". $fetch['email_id'] . "</td><td>". $fetch['mobile_no'] . "</td><td>". $fetch['address'] . "</td><td>". $fetch['city'] . "</td><td>". $fetch['pin_code'] . "</td> </tr>";
echo $data;
}

?>