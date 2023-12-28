<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Your profile</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
   
	<h1 align="center">Your profile</h1> <div class="col-lg-3" style="margin-left: 1%;"><button class="btn btn-default btn-lg"><a href="index.php">Back</a></button></div>
	<form>
		<div class="row">
			<div class="col-6">
				<table style="margin-left: 3%;" >
			<tr>
				<th style="padding-top: 35%;">
					<input style="width: 100%;" class="input1 border" type="text" name="name" placeholder="Name">
				</th>
			</tr>
			<tr>
				<th>
					<input  style="width: 100%;" class="input1 border" type="email" name="mail" placeholder="Mail">
				</th>
			</tr>
			<tr>
				<th>
					<input  style="width: 100%;" class="input1 border" type="password" name="password" placeholder="Password">
				</th>
			</tr>
			<tr>
				<th>
						<div>
							<input class="input1 border" type="text" name="news_letter" placeholder="News letter">
						
							&nbsp;&nbsp;<input class="btn btn-success" type="submit" name="yes" value="yes">
								<input type="radio" name="val" checked >&nbsp;<input class="btn btn-success" type="submit" name="no" value="no">	<input type="radio" name="val" >
						</div>
				</th>
			</tr>
			<tr>
				<th>
					<input class="btn btn-success" class="input1 border" type="submit" value="Create"> 
				</th>
			</tr>
		</table>
			</div>
			<div class="col-6" style="margin-top: 50px">
			
			</div>
		</div>
		
		<div style="margin-top:2%; margin-left:2%;display:flex;">
			<input style="width: 35%;height: 1cm;" type="text" name="code" placeholder="                       Inset code from your mail"><input style="height: 1cm;" class="btn btn-success" type="submit" name="yes" value="Confirm">
		</div>
</form>

<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>