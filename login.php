<?php
include("config.php");
require_once("classes/User.class.php");
require_once("classes/Db.class.php");
session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 
	
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']); 
	
	$sql = "SELECT id FROM `users` WHERE 'email' = '$email' and password = '$password'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	
	$count = mysqli_num_rows($result);
	
	// If result matched $email and $password, table row must be 1 row
	  
	if($count == 1) {
	   session_register("user_name");
	   $_SESSION['user_name'] = $username;
	   
	   header("location: index.php");
	}else {
	   $error = "Your Login Name or Password is invalid";
	}
 }

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMDFlix</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="netflixLogin">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign In</h2>

				<?php if (isset($error)): ?>
				<div class="form__error">
					<p>
						Sorry, we can't log you in with that email address and password. Can you try again?
					</p>
				</div>
				<?php endif; ?>

				<div class="form__field">
					<label for="email">Email</label>
					<input type="text" name="email">
				</div>
				<div class="form__field">
					<label for="password">Password</label>
					<input type="password" name="password">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign in" class="btn btn--primary">	
					<input type="checkbox" id="rememberMe"><label for="rememberMe" class="label__inline">Remember me</label>
				</div>

				<div>
					<p>No account yet?<a href="register.php">Sign up here</a></p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>