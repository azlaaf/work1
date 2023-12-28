<?php 
ob_start();
session_start();
include 'config.php';


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
         $_SESSION['type'] = $row['user_type'];
        header('location:index.php');
    }
    else{
       echo"<script> alert('Email ou mots de pas est incorrect')</script>";
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2wahka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
    
        /*nav i.bars {*/
        /*    transition: 0.3s;*/
        /*    cursor: pointer;*/
        /*}*/
        
        /*nav i.bars:hover {*/
        /*    color: blue;*/
        /*}*/
        
        /*nav i.bars:hover + div.content-bars {*/
        /*    display: flex !important;*/
        /*    z-index: 100;*/
        /*}*/
        
        /*nav i.bars + div.content-bars {*/
        /*    background: linear-gradient(45deg,#df4881,#c430d745);*/
            /*transition: 0.3s;*/
        /*    border-radius: 0 0 5px 5px;*/
        /*    top: 70%;*/
        /*    width: 100%;*/
        /*    position: absolute;*/
            /*opacity: 0;*/
        /*}*/
        
        /*nav i.bars + div.content-bars:hover {*/
        /*    display:flex !important;*/
        /*    z-index: 100;*/
        /*}*/
        
        /*nav i.bars + div.content-bars > div > ul {*/
        /*    margin-bottom: 15px;*/
        /*    border-bottom: 1px solid #ddd;*/
        /*}*/
        
               
        /*@media(min-width:768px) {*/
        /*    nav div.content-bars {*/
        /*        background: none !important;*/
        /*        width: max-content !important;*/
        /*        position: relative !important;*/
        /*        flex-grow: 1;*/
        /*    }*/
        /*    nav i.bars + div.content-bars > div > ul {*/
        /*        margin-bottom: 0 !important;*/
        /*        border-bottom: 0 !important;*/
        /*    }*/
        /*}*/
        
    </style>
    
    
</head>
<body>

	<div class="hero">
	    <!--class="d-flex flex-wrap justify-content-between"-->
        <!--<nav>-->
            <!--<a class="logo fs-1" href="https://www.2wahka.com/31012012/">www.2wahka.com</a>-->
            <!--<i class="fa-solid fa-bars d-block d-md-none fs-2 bars"></i>-->
        <!--    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-2 flex-grow-1">-->
        <!--        <div class="">-->
        <!--            <ul class="m-0 p-0 d-flex fs-5">-->
        <!--                <li><a href="https://www.2wahka.com/">Home</a></li>-->
        <!--                <li><a href="https://www.2wahka.com/31012012/#tarif">Prices</a></li>-->
        <!--                <li><a href="https://2wahka.com/31012012/contact_us.html">Contact</a></li>-->
        <!--            </ul>-->
        <!--        </div>-->
               
        <!--        <div class="lg_in d-flex justify-content-between align-items-center fs-5 ms-md-auto">-->
                    <!--<a  href="#" class="login-btn fs-4">Login</a>-->
        <!--            <a style="font-size: 20px;" href="login.php" class=btn border-0 fs-4">Login</a>-->
                    <!--<a  href="register.php" class="btn border-0 fs-4">Create Account</a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</nav>-->
    </div>
    

    <div class="container" style="margin: 50px auto;">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                   
                        </div>
                        
                        <a href="https://2wahka.com/31012012/admin/ab/a.php" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="../index.html#tariff" class="text signup-link">Signup Now</a>
                    </span><br>
					
                </div>
				
            </div>

         
            
    
</body>
</html>
	
	<script>
		const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

 

	</script>
</body>