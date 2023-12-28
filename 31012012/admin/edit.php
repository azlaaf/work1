<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>
<?php
$id=$_GET['idEmployee'];
$sql="select * from employee where idEmployee='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
$idEmploye=$row['idEmployee'];
$Job=$row['Job'];
$Name=$row['Name'];
$Adresse=$row['Adresse'];
$Ville=$row['Ville'];
$CP=$row['Code_Postal'];
$Cin=$row['Cin'];
$Période=$row['Periode'];
$Numéro_employé=$row['Numero_employe'];
$Date_de_disposition=$row['Date_de_disposition'];
$N_account=$row['N_account'];
$N_cnss=$row['N_cnss'];
$N_cimr=$row['N_cimr'];
$Numéro_de_règlement=$row['Numero_de_reglement'];
$bank=$row['bank'];
$statut=$row['statut'];
$Email=$row['Email'];
$phone_number=$row['Phone_number'];
}
?>



    <style>
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
   width: 25%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: #6495ED;
 }
 /*form .button input:hover{
  /* transform: scale(0.99); 
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }*/
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

</style>

<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Edit Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--  <li class="breadcrumb-item"><a href="https://2wahka.com/31012012/admin/index.php" > Home</a></li>-->
                <!--<li class="breadcrumb-item qctive">Dashboard Edit Employee</li>-->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
 

	
    
    <div class="container" style="margin:50px auto ;">
        <div class="card-header bg-white text-center p-3">
                    <h3>Edit Employee</h3>
                </div>
        <div class="form-check"  style="position: relative; left:388px; top:18px;">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                          <label for="fullname" class="form-label fw-bold">Hourly Paid 
                          <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="If the employee is paid per hour">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                          </label>
                        </div>
                        <div class="form-check" style="position: relative; left:388px;; top:19px;">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                          <label for="fullname" class="form-label fw-bold">Monthly Salary
                          <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="If the employee is paid per month">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                          </label>
                        </div>
                        <form method="POST">

                 
                    <?php if($statut=='Activate') {?>
                        <button class="btn btn-success" name="Activate" style="position: relative; right:50 px;top:-30px ;"><?php echo $statut ?></button>
                   <?php } ?>
                   <?php if($statut=='Deactivate') {?>
                        <button class="btn btn-danger" name="Deactivate" style="position: relative; right:50 px;top:-30px ;"><?php echo $statut ?></button>
                   <?php } ?>
                    </form>
        <div class="content">
          <form action="" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Job Title
                 <a style="color:black;" href="#" data-toggle="tooltip" title="The function of the employee">
                                <i class="fa fa-question-circle" ></i></a>
                </span> 
                <input type="text"  value="<?php echo $Job ?>"placeholder=" Job Title"name="Job"  >
              </div>
              <div class="input-box">
                <span class="details">Name 
                <a style="color:black;" href="#" data-toggle="tooltip" title="The name of the employee">
                                <i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="text" value="<?php echo $Name ?>" placeholder=" Name"  name="Name">
              </div>
              <div class="input-box">
                <span class="details">Adresse 
                <a style="color:black;" href="#" data-toggle="tooltip" title="The address of the employee according to ID Card">
                                <i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="text"value="<?php echo $Adresse ?>"  placeholder=" Adresse" name="Adresse"  >
              </div>
              <div class="input-box">
                <span class="details">City 
                <a style="color:black;" href="#" data-toggle="tooltip" title="The city of the employee">
                                <i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="text" value="<?php echo $Ville ?>" placeholder=" City"name="Ville" >
              </div>
              <div class="input-box">
                <span class="details">Zip Code 
                <a style="color:black;" href="#" data-toggle="tooltip" title="The zip code according to ID Card">
                                <i class="fa fa-question-circle" ></i></a>
                </span>
                <input type="text" value="<?php echo $CP ?>" placeholder=" Zip Code" name="CP"  >
              </div>
              <div class="input-box">
                <span class="details">Cin 
               <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Your National identity card number"></a>
                                                </span>
                <input type="text" value="<?php echo $Cin ?>" placeholder=" Cin" name="Cin"  disabled  >
              </div>
              <div class="input-box">
                <span class="details">Hours 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="How many hours the employee works per month, if the employee if paid monthly enter 1"><i
                                                class="fa fa-question-circle"></i></a></span>
                <input type="number"value="<?php echo $Période ?>"  placeholder=" Periode" name="Periode" >
              </div>
              <div class="input-box">
                <span class="details">Employee Number 
<a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Employee number, so the employee got a unique ID number in the accounting department[Note : Employee number can't be changed]"></a>                </span>
                <input type="number"value="<?php echo $Numéro_employé ?>"  placeholder="Num Employee" name="N_employe"  disabled>
              </div>

              <div class="input-box">
                <span class="details">Work start date 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The date when the employee started working"></a>
                </span>
                <input type="date" value="<?php echo $Date_de_disposition ?>" placeholder="Work start date"  name="Datede_disposition"  disabled>
              </div>
               <div class="input-box">
                <span class="details">CNSS Number 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Social Security Number [Note : the number can't be changed]. If your company does not have CNSS, please inset 00000, and desactivate it in edit employee"><i
                                                class="fa fa-question-circle"></i></a>
                </span>
                <input type="number" value="<?php echo $N_cnss ?>" placeholder="CNSS Number"  name="cnss">
              </div>
               <div class="input-box">
                <span class="details">CIMR Nunber 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="If your company pays insurance to your employee"><i
                                                class="fa fa-question-circle"></i></a>
                </span>
                <input type="number" value="<?php echo $N_cimr ?>" placeholder="CIMR Nunber"  name="cimr">
              </div>
               <div class="input-box">
                <span class="details">DIM 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Number if there is an extra assurance. If your company does not have an extra inssurance inset 00000, and desactivate it in edit employee "><i
                                                class="fa fa-question-circle"></i></a>
                </span>
                <input type="number" value="" placeholder="DIM"  name="DIM">
              </div>
               <div class="input-box">
                <span class="details">AMO
<a style="color:black;" href="#" data-toggle="tooltip"
                                            title="If your company pays an extra insurance"><i
                                                class="fa fa-question-circle"></i></a>                </span>
                <input type="number" value="" placeholder="AMO"  name="AMO">
              </div>
              <div class="input-box">
                <span class="details">Salary 
                <a style="color:black;" href="#" data-toggle="tooltip" title="if you have set the employee to a monthly salary, enter the gross monthly salary,
                     if the employee is paid by the hour, enter the gross hourly salary"><i
                                                class="fa fa-question-circle"></i></a>
                </span>
                <input type="number" value="<?php echo $Numéro_de_règlement ?>" placeholder="Salary" name="N_reglement">
              </div>
              <div class="input-box">
                <span class="details">Bank Account Number 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The bank account number is also what called RIB number.It is always 24 number."><i
                                                class="fa fa-question-circle"></i></a>
                </span>
                <input type="number" value="<?php echo $N_account ?>" placeholder="Account Number" name="N_account">
              </div>
              <div class="input-box">
                <span class="details">Bank 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Tha name of the bank"><i class="fa fa-question-circle"></i></a>
                </span>
                <select name = "bank" value="<?php echo $bank ?>" class="rounded-0" style="height: 45px;
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
                <span class="details">Email 
                <a style="color:black;" href="#" data-toggle="tooltip"
                                            title="The Email to send the password to the employee"><i
                                                class="fa fa-question-circle"></i></a>
                </span>
                <input type="text" value="<?php echo $Email ?>" placeholder="Email" name="Email">
              </div>
              <div class="input-box">
                <span class="details">Phone number 
<a style="color:black;" href="#" data-toggle="tooltip"
                                            title="Phone number of the employee"><i
                                                class="fa fa-question-circle"></i></a>                </span>
                <input type="number" value="<?php echo $phone_number ?>" placeholder="Phone Number" name="Phone_number">
              </div>
            </div>
            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="create">
                                        Submit
                                    </button>
                                </div>
                            </div>
          </form>
        </div>
      </div>
</body>
<?php
include('config.php');
$id=$_GET['idEmployee'];
@$job=$_POST['Job'];
@$Name=$_POST['Name'];
@$Adresse=$_POST['Adresse'];
@$Ville=$_POST['Ville'];
@$CP=$_POST['CP'];
@$Cin=$_POST['Cin'];
@$Periode=$_POST['Periode'];
@$N_e=$_POST['N_employe'];
@$Date=$_POST['Date_de_disposition'];
@$N_account=$_POST['N_account'];
@$cnss=$_POST['cnss'];
@$cimr=$_POST['cimr'];
@$N_reglement=$_POST['N_reglement'];
@$bank=$_POST['bank'];
@$Email=$_POST['Email'];
@$Phone_number=$_POST['Phone_number'];

if(isset($_POST['update'])){
   $idEmploye = $_POST['idEmployee'];
$sql="UPDATE employee SET Job='$job',Name='$Name',Adresse='$Adresse',Ville='$Ville' ,Adresse='$Adresse',Code_Postal='$CP',Cin='$Cin' ,Periode='$Periode',Numero_employe='$N_e',N_account='$N_account',N_cnss='$cnss',N_cimr='$cimr',Numero_de_reglement='$N_reglement',bank='$bank',Email='$Email',Phone_number='$Phone_number' where idEmployee='$id'";
    if (mysqli_query($conn, $sql)) {
      ?>
      <script>
        alert('Update success');
        window.location.href='list-employee.php';
      </script>
      <?php
      
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
if($statut == "Activate"){
    $sql= "update employee set statut ='Deactivate' where idEmployee='$id' ";
    $res = mysqli_query($conn,$sql);
}else{
     $sql= "update employee set statut ='Activate' where idEmployee='$id' ";
    $res = mysqli_query($conn,$sql);
}

?>

  
<?php
include ('includes/footer.php');
?>