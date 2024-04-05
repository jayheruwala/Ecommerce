<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/acc_info.css">
</head>
<body>
    <?php
    include_once 'headerForm.php'; 
    ?>
    <div class="wrapper">
        <div class="title" id="title">
            Account Detail
        </div>
        <form name="Form" onsubmit="return validateForm()" action="editinfo.php" method="post">

            <?php
        include_once 'connection.php';
        $u_id=$_SESSION['user_id'];
        $query="SELECT *  from register where user_id='$u_id'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0){
            $user_detail=mysqli_fetch_array($result,MYSQLI_ASSOC);
            ?>
            <div class="field name">
                <div class="lable name"><label for="">name:</label></div>
                <div class="input-area">
                    <input type="text" name="name" id="name" value="<?php echo $user_detail["name"] ?>" readonly require>
                </div>
                <div class="error"></div>
            </div>

            <div class="field mobile">
                <div class="lable"><label for="">mobile NO:</label></div>
                <div class="input-area">
                    <input type="text" name="mobile" id="mobile" value="<?php echo $user_detail["mobile_no"] ?>" maxlength="10" minlength="10"  readonly require>
                </div>
                <div class="error"></div>
            </div>

            <div class="field email">
                <div class="lable"><label for="">email:</label></div>
                <div class="input-area">
                    <input type="text" name="email" id="" value="<?php echo $user_detail["email_id"] ?>" readonly require>
                </div>
                <div class="error"></div>
            </div>

            <div class="field address">
                <div class="lable"><label for="">address:</label></div>
                <div class="input-area">
                    <input type="text" name="address" id="" value="<?php echo $user_detail["address"] ?>" readonly require>
                </div>
                <div class="error"></div>
            </div>

            <div class="field city">
                <div class="lable"><label for="">city:</label></div>
                <div class="input-area">
                    <input type="text" name="city" id="" value="<?php echo $user_detail["city"] ?>" readonly require>
                </div>
                <div class="error"></div>
            </div>
            <div class="field pin_code">
                <div class="lable"><label for="">pin_code:</label></div>
                <div class="input-area">
                    <input type="text" name="pin_code" id="" value="<?php echo $user_detail["pin_code"] ?>" readonly require>
                </div>
                <div class="error"></div>
            </div>
            <div class="buttons" id="submit" style="display:none">
                <input type="submit" class="btn" value="Edit User" >
            </div>
        
        <?php

        }else{
            echo"";
        }
        ?>

        </form>
        
        <div class="buttons">
            <button class="btn" onclick="updateUser();" id="exit_btn">Update</button>
            <!-- <button class="btn" id="delete_btn">Delete</button> -->
            <script>
                function updateUser(){
                    document.getElementById("submit").style.display="block";
                    document.getElementById("exit_btn").style.display="none";
                    // document.getElementById("delete_btn").style.display="none";
                    document.getElementById("title").innerHTML="Account Modify";
                 
                    var inputs=document.getElementsByTagName("input");
                    for(i=0;i<inputs.length;i++){
                        inputs[i].readOnly=false;
                    }
                }
            </script>
        </div>
    </div>
</body>
</html>