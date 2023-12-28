<?php 
ob_start();
session_start();
include 'admin/config.php';


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM userprofile WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('location:dashboard_bad_payer.php');
    }
    else{
       echo"<script> alert('Email ou mots de pas est incorrect')</script>";
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
			<img src="img/bg1.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>email</h5>
           		   		<input type="text" class="input" name="email" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
            	<a href="https://2wahka.com/31012012/admin/ab/a.php">Forgot Password?</a>
            	<input type="submit" class="btn" name="submit" value="Login">
				<span class="text">Not a member?<a href="register_bad_payer.php" class="">Signup Now</a>
                    </span>
            </form>
        </div>
    </div>
    	<img class="rotate_01" src="img/settings-icon.png">
	<img class="rotate_02" src="img/settings-icon.png">
	<img class="rotate_03" src="img/settings-icon.png">
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
