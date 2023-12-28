<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="a.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title></title>
</head>
<body style="background-color:#519af4;">
<div class="container" style="padding-top: 60px;">
	<div class="row class1">
	<div class="col-4" style="padding-top: 60px;"><p style="font-size: 30px;
    color: white;" class="p1">Mot de passe perdu ? Veuillez saisir votre adresse e-mail. <br> Vous recevrez un lien pour créer un nouveau mot de passe par e-mail.</p><img src="img4.png" alt=""></div>
	<div class="col-4"></div>
	<div class="col-4" style="width: 10cm;
	height: 15cm;
	background-color: white;"><a href="https://2wahka.com/2wahka/admin/login.php"><img src="img5.png">Retour</a>
<p style="font-size:25px;
padding-top: 30px;
padding-left: 35px;
align-content: center;
">Entrez votre adresse e-mail </p>
<img style="padding-top:60px;
padding-left: 100px;
" src="img6.png">
<?php
include('db.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
  	$error .="<p>Invalid email address please type a valid email address!</p>";
	}else{
	$sel_query = "SELECT * FROM user WHERE email='".$email."'";
	$results = mysqli_query($con,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "<p>No user is registered with this email address!</p>";
		}
	}
	if($error!=""){
	echo "<div class='error'>".$error."</div>
	<br /><a href='javascript:history.go(-1)'>Go Back</a>";
		}else{
	$expFormat = mktime(date("H")+1, date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5($email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Cher utilisateur,</p>';
$output.='<p>Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://2wahka.com/2wahka/admin/ab/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://2wahka.com/2wahka/admin/ab/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Assurez-vous de copier tout le lien dans votre navigateur.
Le lien expirera après 1 jour pour des raisons de sécurité.</p>';
$output.='<p>Si vous n’avez pas demandé ce mot de passe oublié, aucune action 
est nécessaire, votre mot de passe ne sera pas réinitialisé. Toutefois, vous pouvez ouvrir une session 
votre compte et changer votre mot de passe de sécurité comme quelqu’un l’a peut-être deviné.</p>';   	
$output.='<p>Merci,</p>';
$output.='<p>AM!</p>';
$body = $output; 
$subject = "Recuperation du mot de passe ";

$email_to = $email;
$fromserver = "mse@marokkobizit.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "send.one.com"; 
$mail->SMTPAuth = true;
$mail->Username = "mse@marokkobizit.com"; 
$mail->Password = "0628020029"; 
$mail->Port = 587;
$mail->IsHTML(true);
$mail->From = "mse@marokkobizit.com";
$mail->FromName = "MBID";
$mail->Sender = $fromserver; 
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>Un e-mail vous a été envoyé avec des instructions sur la façon de réinitialiser votre mot de passe.</p>
</div><br /><br /><br />";
	}

		}	

}else{
?>
<form method="post" action="" name="reset"><br /><br />
<div class="lab1">
<input   class="form form-control" type="email" name="email" placeholder="username@email.com" />
<br /><br />
<input style="align-content: center;
margin-left: 100px;
" class="btn btn-primary" align="center" type="submit" value="Reset Password"/></div>
</form></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>
</div>
	
</div>
</div>
<div class="img1">
	
</div>



<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>