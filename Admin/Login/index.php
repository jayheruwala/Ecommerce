<?php
include_once "../pages/connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/main.css">

	<!--===============================================================================================-->
</head>
<style>
</style>

<body>

	<div class="limiter">
		<div class="container-login" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login ">
				<form class="login-form validate-form" method="post" action="index.php">


					<div class="">
						<span class="txt1">
							Email ID
						</span>
					</div>
					<div class="wrap-input validate-input" data-validate="Email is required">
						<input class="input" type="email" name="email" required inputmode="email">
						<span class="focus-input"></span>
					</div>

					<div class="">
						<span class="txt1">
							Password
						</span>
					</div>
					<div class="wrap-input validate-input" data-validate="Password is required">
						<input class="input" type="password" name="pass" required>
						<span class="focus-input"></span>
					</div>

					<div class="Error" id="Error">Invalid Email Id and Password</div>

					<div class="form-btn ">
						<button class="btn" name="sign_in">
							Sign In
						</button>
					</div>

					<div class="" style="text-align: center; margin-top: 5px;">
						<span class="txt2">
							Not a member?
						</span>

						<a href="register.html" class="txt2 bo1">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php
  	if($_SERVER["REQUEST_METHOD"]== "POST")
  	{
		if(isset($_POST['sign_in']))
		{
			$email=$_POST['email'];
			$password=$_POST['pass'];

			$checkValidX = "SELECT * FROM `admin` WHERE `email_id`='$email'";
			$checkValidResultX = mysqli_query($conn,$checkValidX);
			if(mysqli_num_rows($checkValidResultX) > 0)
			{
				$fetch=mysqli_fetch_assoc($checkValidResultX);
				$passwordX=$fetch['password'];
				$verify=password_verify($password,$passwordX);
				if($verify){
					// echo $fetch['admin_id'];
					$admin_id = $fetch['admin_id'];
					$_SESSION['adminId'] = $admin_id;
					// echo $_SESSION['adminId'];
					header('Location:../index.php');
				}
				else
				{
					?>
					<script>
						var Error = document.getElementById('Error');
						Error.innerText = "Invalid Email-id And Password";
						Error.style.visibility = 'visible';
					</script>
					<?php
				}
			}
			else
			{
					?>
				<script>
					var Error = document.getElementById('Error');
					Error.innerText = "You Have No Account. Create a Account";
					Error.style.visibility = 'visible';
				</script>
				<?php
			}
		}
	}
?>


</body>

</html>