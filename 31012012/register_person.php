<?php
include('admin/config.php');
error_reporting(0);
    if (isset($_POST['submit'])) {
        $entreprise = $_POST['entreprise'];
    	$adresse = $_POST['adresse'];
    	$email =$_POST['email'];
    	$password = $_POST['password'];
        $CP = $_POST['CP'];
        $nb = $_POST['nb'];
        $email = $_POST['email'];
        $ville = $_POST['ville'];
        $phone =$_POST['phone'];
        $img_name = $_FILES['pp']['name'];
        $tmp_name = $_FILES['pp']['tmp_name'];
        $error = $_FILES['pp']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($entreprise, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);
            }
         }
        //  insert all iformation
         $sql = "INSERT INTO `userprofile` (`Entreprise`, `Adresse`, `Ville`, `Code_postal`, `patent_Number`, `email`, `password`, `logo`, `phone`) VALUES ('$entreprise', '$adresse', '$ville', '$CP', '$nb',  '$email', '$password', '$img_upload_path', '$phone')";
         // getting resultat
		$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>
        				alert('done! User Registration Completed.');
        				window.location.href='';
    				 </script>";
                
			} else {
		    	echo mysqli_errno($conn) . ": " . mysqli_error($conn) . "\n";
			}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2wahka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .container {
      max-width: 800px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }
    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }
    .container .title::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }
    .content form .user-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
    }
    form .user-details .input-box {
      margin-bottom: 15px;
      width: calc(100% / 2 - 20px);
    }
    form .input-box span.details {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }
    .user-details .input-box input {
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }
    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
      border-color: #9b59b6;
    }
    form .gender-details .gender-title {
      font-size: 20px;
      font-weight: 500;
    }
    form .category {
       display: flex;
       width: 80%;
       margin: 14px 0 ;
       justify-content: space-between;
    }
    form .category label {
       display: flex;
       align-items: center;
       cursor: pointer;
    }
    form .category label .dot {
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }
    #dot-1:checked ~ .category label .one,
    #dot-2:checked ~ .category label .two,
    #dot-3:checked ~ .category label .three {
        background: #9b59b6;
        border-color: #d9d9d9;
    }
    form input[type="radio"] {
        display: none;
    }
    form .button {
        height: 45px;
        margin: 35px 0;
    }
    form .button input {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }
    form .button input:hover {
        /* transform: scale(0.99); */
        background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    }
    @media(max-width: 584px) {
        .container{
            max-width: 100%;
        }
        form .user-details .input-box{
            margin-bottom: 15px;
            width: 100%;
        }
        form .category{
            width: 100%;
        }
        .content form .user-details{
            max-height: 300px;
            overflow-y: scroll;
        }
        .user-details::-webkit-scrollbar{
            width: 5px;
        }
    }
    @media(max-width: 459px){
        .container .content .category{
            flex-direction: column;
        }
    }
    </style>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#cp').keyup(function() {
                var sid = $(this).val();
			
                var data_String = 'sid=' + sid;
                $.get('zip.php', data_String, function(result) {

                    $.each(result, function(){
                        
                        $('#ville').val(this.ville);
                       
                    });


                });
            });
        });
    </script>
</head>
<body>
    <div class="container" style="margin:50px auto ;">
        <div class="title">Registration</div>
        <div class="content">
          <form action="" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Name</span>
                <input type="text" placeholder="Enter your name"name="entreprise" required >
              </div>
              <div class="input-box">
                <span class="details">Address</span>
                <input type="text" placeholder="Enter your address"  name="adresse">
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="text" placeholder="Enter your email" name="email" required >
              </div>
              <div class="input-box">
                <span class="details">Contact person</span>
                <input type="number" placeholder="Enter your Contact person"name="phone" >
              </div>
              <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Enter your password" name="password" required >
              </div>
              <div class="input-box">
                <span class="details">Postal code</span>
                <input type="number" placeholder="Enter your Postal code" name="CP" id="cp"  required>
              </div>
              <div class="input-box">
                <span class="details">City</span>
                <input type="text" placeholder="Enter your city" name="ville" id="ville" >
              </div>
              <div class="input-box">
                <span class="details">CIN/Patent</span>
                <input type="number" placeholder="Enter your CIN/Patent" name="nb" required>
              </div>
              <div class="input-box">
                <span class="details"> Upload logo</span>
                <input type="file"  name="pp">
              </div>
            
            </div>
            <div class="button">
              <input type="submit" value="Register" name="submit">
            </div>
          </form>
        </div>
      </div>
    <!-- Registration Form -->
</body>
</html>
	
<!--</body>-->