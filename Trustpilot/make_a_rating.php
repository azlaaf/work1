<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="make_a_rating.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div id="titre1">
		<h1 align="center" style="color : #fff;">Make a rating</h1>
	</div>
	<div style="margin-top: -5%;" align="right;margin-right:12%;"><button style="margin-left:125px;" class="btn btn-default btn-lg"><a href="https://2wahka.com/Trustpilot/index.php">Back</a></button></div>
	<br><br>
	<form action="save_make_a_rating.php" method="post">
		<table>
			<tr>
				<th>
					<input class="input1 border" type="text" name="company" placeholder="Business / company">
				</th>
			</tr>
			<tr>
				<th>
					<input class="input1 border" type="text" name="addresse" placeholder="Addresse">
				</th>
			</tr>
			<tr>
				<th>
					<input class="input1 border" type="text" name="city" placeholder="City">
				</th>
			</tr>
			<tr>
				<th>
					<input class="input1 border" type="text" name="Phone_number" placeholder="Phone number"> 
				</th>
			</tr>
		
		
		
		</table><br><br>
		
		<div align="center" >
			<TEXTAREA name="text_area" rows=10 cols=80 placeholder="                                                                                                                                                                                                                                     Your experience ”min 0 – max 5000”  words"></TEXTAREA>
		</div>
		

<div class="dis" >
    	<input class="input1 border" type="number" min="1" max="5" name="stars" placeholder="" style="heignt:60px; margin-left:27.5%; width:100px;"> 
    	<div class="submit" style="margin-left:28.5%;">
        <input class="input2 btn btn-default btn-lg"  type="submit" name="submit" value="publish" style="height: 47px">
        </div>
</div>
	<div style="margin-top:-20px; margin-right:50px">
       <img src="ressources/stars.png" style="width:100px;height:70px; margin-left:28.5%;" >
          </div>
   
  
    
	
</form>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>