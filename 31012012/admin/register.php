<?php
include('config.php');
error_reporting(0);
    if (isset($_POST['submit'])&& isset($_GET['type']) && ($_GET['type'] == 'free' || $_GET['type'] == 'silver' || $_GET['type'] == 'gold')) {
    $entreprise = $_POST['entreprise'];
	$adresse = $_POST['adresse'];
	$email =$_POST['email'];
	$password = $_POST['password'];
    $CP = $_POST['CP'];
    $nb = $_POST['nb'];
    $cnss = $_POST['cnss'];
    $n_cnss = $_POST['n_cnss'];
    $nt = $_POST['nt'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $phone =$_POST['phone'];
    $bank =$_POST['bank'];
    $rib =$_POST['rib'];
    $tva = $_POST['tva'];
     $type = $_GET['type'];
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
         $sql = "INSERT INTO `user` (`Entreprise`, `Adresse`, `Ville`, `Code_postal`, `patent_Number`, `cimr`, `N_d_CNSS`, `N_de_taxe_proff`, `email`, `password`, `logo`, `phone`, `rib`, `bank`, `tva`,`user_type`) VALUES ('$entreprise', '$adresse', '$ville', '$CP', '$nb', '$cnss', '$n_cnss', '$nt', '$email', '$password', '$img_upload_path', '$phone', '$rib', '$bank', '$tva','$type')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>
				alert('done! User Registration Completed.');
				window.location.href='login.php';
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
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}



.container{
  max-width: 800px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
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
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
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
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
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
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
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
nav a.btn-Sinscr   {
    display: inline-block;
    text-decoration: none;
    padding: 10px 30px;
    color: #fff;
    background: linear-gradient(45deg,#df4881,#c430d7);
    /*font-size: 14px;*/
    border-radius: 30px 0px 30px 30px;
    /*border-top-right-radius: 0;*/
    transition: 0.5s;
        
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
	<div class="hero">
        <nav class="d-flex justify-content-between algin-content-center flex-wrap" style="margin-top:20px;">
            <!--two change -->
            <div style="font-size: 20px;">
            <ul class="list-unstyled d-flex justify-content-between">
                        <li class="ms-0"><a href="https://2wahka.com/31012012/index.html">Home</a></li>
                        <li><a href="https://2wahka.com/31012012/#tarif">Prices</a></li>
                        <li><a href="https://2wahka.com/31012012/contact_us.html">Contact</a></li>
                    </ul>
            </div>
               <div class="lg_in mt-2 mt-md-0 d-flex align-items-center" style="font-size: 20px;">
                    <a style="font-size: 20px;" href="login.php" class="login-btn">Login</a>
                     <a style="font-size: 20px;" href="register.php" class="btn">Create Account</a>
                </div>
        </nav>
      </div> 
        


    <div class="container" style="margin:50px auto ;">
        <div class="title">Registration</div>
        <div class="content">
          <form action="" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">
                    Company
                    <a style="color:black;" href="#" data-toggle="tooltip" title="Name of the company [Note: same name will appear at your invoice and salary slip]"><i class="fa fa-question-circle" ></i></a>
                    </span>
                <input type="text" placeholder="Enter your Company name"name="entreprise" required >
              </div>
              <div class="input-box">
                <span class="details">Address
                    <a style="color:black;" href="#" data-toggle="tooltip" title="The company's address"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="text" placeholder="Enter your address"  name="adresse">
              </div>
              <div class="input-box">
                <span class="details">Email
                    <a style="color:black;" href="#" data-toggle="tooltip" title="The E-mail to send the password to"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="text" placeholder="Enter your email" name="email" required >
              </div>
              <div class="input-box">
                <span class="details">Phone number
                    <a style="color:black;" href="#" data-toggle="tooltip" title="Phone number of the company"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="number" placeholder="Enter your phone number"name="phone" >
              </div>
              <div class="input-box">
                <span class="details">Password
                    <a style="color:black;" href="#" data-toggle="tooltip" title="The password if Time reg is activated"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="password" placeholder="Enter your password" name="password" required >
              </div>
              <div class="input-box">
                <span class="details">Zip code
                <a style="color:black;" href="#" data-toggle="tooltip" title="Zip according to company's RC"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="number" placeholder="Enter your zip code" name="CP" id="cp"  required>
              </div>
              <div class="input-box">
                <span class="details">City
                <a style="color:black;" href="#" data-toggle="tooltip" title="City according to company's RC"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="text" placeholder="Enter your city" name="ville" id="ville" >
              </div>
              <div class="input-box">
                <span class="details">Patent number
                <a style="color:black;" href="#" data-toggle="tooltip" title="You can find it at your RC.[Remember Patent Number can't be changed]"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="number" placeholder="Enter your patent number" name="nb" required>
              </div>
              <div class="input-box">
                <span class="details">Cimr number
                <a style="color:black;" href="#" data-toggle="tooltip" title="If your company pays inssurance to your employee"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="number" placeholder="Enter your cimr number" name="cnss" >
              </div>

              <div class="input-box">
                <span class="details">Cnss number
                <a style="color:black;" href="#" data-toggle="tooltip" title="If your company pays social security"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="number" placeholder="Enter your cnss number"  name="n_cnss">
              </div>
              <div class="input-box">
                <span class="details">Professional tax number
                <a style="color:black;" href="#" data-toggle="tooltip" title="Your tax number is at your RC"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="number" placeholder="Enter your professional tax number" name="nt">
              </div>
              <div class="input-box">
                <span class="details">Bank
                <a style="color:black;" href="#" data-toggle="tooltip" title="The name of the bank"><i class="fa fa-question-circle" ></i></a>
                </span>
                <select name = "bank"  class="rounded-0" style="height: 45px;
                width: 100%;
                outline: none;
                font-size: 16px;
                border-radius: 5px;
                padding-left: 15px;
                border: 1px solid #ccc;
                border-bottom-width: 2px;
                transition: all 0.3s ease;
            ">
                    <option value = "N/A" >N/A</option>
                    <option value = "Banque Populaire" selected>Banque Populaire</option>
                     <option value = "Attijariwafa Bank">Attijariwafa Bank</option>
                     <option value = "Bank of Africa">Bank of Africa</option>
                     <option value = "Société générale Maroc">Société générale Maroc</option>
                     <option value = "BMCI">BMCI</option>
                     <option value = "Crédit agricole du Maroc">Crédit agricole du Maroc</option>
                     <option value = "Crédit du Maroc">Crédit du Maroc</option>
                     <option value = "CIH Bank">CIH Bank</option>
                     <option value = "CFG Bank">CFG Bank</option>
                     <option value = "Arab Bank Maroc">Arab Bank Maroc</option>
                     <option value = "Banco Immobiliario & Mercantil de Marruecos">Banco Immobiliario & Mercantil de Marruecos</option>
                     <option value = "Bank Al Amal">Bank Al Amal</option>
                     <option value = "Bex-Maroc">Bex-Maroc</option>
                     <option value = "Caisse Interprofessionnelle Marocaine de Retraites">Caisse Interprofessionnelle Marocaine de Retraites</option>
                     <option value = "Caisse Marocaine des Marches">Caisse Marocaine des Marches</option>
                     <option value = "Caisse Mutualiste Interprofessionelle">Caisse Mutualiste Interprofessionelle</option>
                     <option value = "Caisserie Commerciale">Caisserie Commerciale</option>
                     <option value = "Citibank Maghreb">Citibank Maghreb</option>
                     <option value = "Limar Bank Casa Union Marocaine de Banques">Limar Bank Casa Union Marocaine de Banques</option>
                     <option value = "Raw-Mat Bank">Raw-Mat Bank</option>
                     <option value = "Societe de Banque & de Credit">Societe de Banque & de Credit</option>
                     <option value = "Societe Mithaq Al Maghreb">Societe Mithaq Al Maghreb</option>
                     <option value = "Union Bancaria Hispano Marroqui Uniban">Union Bancaria Hispano Marroqui Uniban</option>
                     <option value = "Union Marocaine de Banques">Union Marocaine de Banques</option>
                     <option value = "Banque Commerciale du Maroc">Banque Commerciale du Maroc</option>
                     <option value = "Banque Marocaine pour l'Afrique et l'Orient">Banque Marocaine pour l'Afrique et l'Orient</option>
                     <option value = "Banque Nationale pour le Developpement Economique">Banque Nationale pour le Developpement Economique</option>
                     <option value = "Societe Marocaine de Depot et Credit">Societe Marocaine de Depot et Credit</option>
                     <option value = "Wafabank">Wafabank</option>
                  </select>
              </div>
              <div class="input-box">
                <span class="details">Rib
                <a style="color:black;" href="#" data-toggle="tooltip" title="Your bank account number"><i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="number" placeholder="Enter your rib" name="rib">
              </div>
             <div class="input-box">
                <span class="details">VAT
                <a style="color:black;" href="#" data-toggle="tooltip" title="Choose your company VAT"><i class="fa fa-question-circle" ></i></a>
                </span>
                <select name = "tva"class="rounded-0" style="height: 45px;
                width: 100%;
                outline: none;
                font-size: 16px;
                border-radius: 5px;
                padding-left: 15px;
                border: 1px solid #ccc;
                border-bottom-width: 2px;
                transition: all 0.3s ease;
            ">
                    <option value = "0" >0%</option>
                    <option value = "7" selected>7%</option>
                     <option value = "10">10%</option>
                     <option value = "14">14%</option>
                     <option value = "20">20%</option>

                  </select>
              </div>
              <div class="input-box">
                <span class="details"> Upload logo
                <a style="color:black;" href="#" data-toggle="tooltip" title="upload your company's logo image"><i class="fa fa-question-circle" ></i></a>
                </span>
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
	
	
</body>