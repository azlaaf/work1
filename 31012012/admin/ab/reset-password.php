<html>
<head>
<title></title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div style="width:500px;height: 15cm;  margin:50 auto; background-color: lightblue;" align="center">

<h2>Reset Password</h2> 
<img style="padding-top:60px;padding-left: 20px;" src="img8.png">  

<?php
include('db.php');
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.</p>
<p><a href="http://localhost/a/index.php">Click here</a> to reset password.</p>';
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
    <br />
	<form method="post" action="" name="update">
	<input type="hidden" name="action" value="update" />
	<br /><br />
	<label><strong>Entrez un nouveau mot de passe:</strong></label><br />
	<input type="password" name="pass1" id="pass1" maxlength="15" required />
    <br /><br />
	<label><strong>Ré-entrez le nouveau mot de passe:</strong></label><br />
	<input type="password" name="pass2" id="pass2" maxlength="15" required/>
    <br /><br />
	<input type="hidden" name="email" value="<?php echo $email;?>"/>
	<input class="btn btn-primary" type="submit" id="reset" value="réinitialiser le mot de passe" />
	</form>
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>Le lien est expiré. Vous essayez d'utiliser le lien expiré qui n'est valide que 24 heures (1 jours après la demande).<br /><br /></p>";
				}
		}
if($error!=""){
	echo "<div class='error'>".$error."</div><br />";
	}			
} 


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
		$error .= "<p>Le mot de passe ne correspond pas, les deux mots de passe doivent être identiques.<br /><br /></p>";
		}
	if($error!=""){
		echo "<div class='error'>".$error."</div><br />";
		}else{

$pass1 = md5($pass1);
mysqli_query($con,
"UPDATE `user` SET `password`='".$pass1."' WHERE `email`='".$email."';");	

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");		
	
echo '<div class="error"><p>Toutes nos félicitations! Votre mot de passe a été mis à jour avec succès.</p>';
		}		
}
?>


<br /><br />

</div>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>