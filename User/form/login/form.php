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
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.3/css/all.min.css">
</head>
<style>
    .errx{
        display: block;
    }
</style>
<body>
    <div class="wrapper">
        <header>Login</header>
        <form action="" method="post">
            <div class="field email">
                <div class="input-area">
                    <input type="text" placeholder="Email Address" name="en_email" id="">
                    <i class="icon fas fa-envelope bi-envelope"></i>
                    <i class="error error-icon fas fa-exclamation-circle bi-exclamation-circle "></i>
                </div>
                <div class="error error-txt">Email Can't be blank</div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" placeholder="Password" name="en_password" id="">
                    <i class="icon fas fa-lock bi-lock"></i>
                    <i class="error error-icon fas fa-exclamation-circle  bi-exclamation-circle"></i>
                </div>
                <div class="error error-txt">Password Can't be blank</div>
            </div>
            <div class="pass-txt"><a href="#">Forgot password?</a></div>
            <div class="errmsg" id="errmsgs">
                Invalid Email id and password
            </div>
            <input type="submit" value="Login">
        </form>

        <div class="sign-txt">Not yet member? <a href="../registration/registrationform.html">Signup now</a></div>
    </div>
    <script src="form.js"></script>

    <?php
        include_once '../../connection.php';
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST['en_email'];
            $password = $_POST['en_password'];

            $query = "SELECT * FROM `register` where `email_id`='$email' AND `password` = '$password'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0){
                $fetch = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $fetch["user_id"];
                echo $_SESSION['user_id'];
                header("Location:../../index.php");

            }else{
                echo"
                <script>
                var errmsg = document.getElementById('errmsgs');
                errmsg.classList.add('errx');
                </script>
                ";
                
            }
        }
    ?>
</body>
</html>