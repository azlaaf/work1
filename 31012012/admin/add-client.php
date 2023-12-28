<?php
session_start();
$email=$_SESSION['email'];
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div 
 class="col-sm-6">
            <h1 class="m-0">Dashboard Customer Creation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!-- <li class="breadcrumb-item"><a href="https://2wahka.com/31012012/admin/index.php">Home</a></li>-->
              <!--<li class="breadcrumb-item active">Dashboard customer creation</li>-->
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
 
    

             
                
                <div class="container">
    <div class="row justify-content-center">
        <div style="
    margin-top: -85px;" class="col-md-8">
            <div class="row my-5">
                <div class="col-md-6 mx-auto">
                   
                </div>
            </div>
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3>Customer Creation</h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="">
            <div class="container">
            <div class="row">
                        <div class="col form-group mb-3">
                            <!--fullname-->
                            <label for="Entreprise" class="form-label fw-bold">Company Name</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's company name">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" name="Entreprise" value="" placeholder="Company Name" class="form-control" style="width:75%;">
  
                        </div>
                        <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" for="Adresse">Address
                             <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's address">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            <input type="text" class="form-control" value=""  name="Adresse" placeholder="Address" style="width:75%;">
                        </div>
            </div>
             <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="Ville">City</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's city name">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" class="form-control" value=""  placeholder="City" name="Ville" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" for="CP">Zip Code
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's zip code ">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            <input type="text" class="form-control" value=""  placeholder="Zip Code" name="CP" style="width:75%;">
                        </div>
            </div>
            <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="pn">Patent number</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="Patent number, you can find it at your RC.[Note: Patent number can't be changed]">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" class="form-control" value=""  placeholder="Patent Number" name="pn" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <!-- the last value of attrubite for = city-->
                            <label class="col form-label fw-bold" for="Num">Phone number
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="Phone number of the customer">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            <input type="text" id="num" class="form-control" value=""  placeholder="Phone number" name="Num" style="width:75%;">
                        </div>
            </div>
             <div class="row">
                        <div class="col form-group mb-3">
                            <!-- the last value of attrubite for = city-->
                            <label class="form-label fw-bold" for="email">E-mail</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The E-mail of the customer to send docs to it">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" class="form-control" value=""  placeholder="E-mail" name="email" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <!-- the last value of attrubite for = city-->
                            <label class="col form-label fw-bold" for="contact">Contact person
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The name of the manager of the company">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                             
                            <input type="text" class="form-control" value=""  placeholder="Contact persont" name="contact" style="width:75%;">
                        </div>
            </div>
             <div class="row">
                        <div class="col form-group mb-3">
                            <!-- the last value of attrubite for = city-->
                            <label class="form-label fw-bold" for="cn">Customer number</label>
                             <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" id="numcl" class="form-control" value=""  placeholder="Customer Number" name="cn" style="width:75%;">
                        </div>
                       
                         <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" for="city">Payment terms
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The way the customer's chooses to pay">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label><br>
                            <select name = "paiement" style="width:35%;">
                                <option value = "cash" selected>cash</option>
                                <option value = "5jours">5 Days</option>
                                <option value = "30jours">30 Days</option>
                                <option value = "+30jours">Ongoing month + 30 days</option>
                             </select>
                        </div>
            </div>
                         <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">If you choose "Current month", please enter the number of days</label>
                            <input type="text" class="form-control" value=""   name="jrs" style="width:35%;">
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="create">
                                   Create
                                </button>
                            </div>
                        </div>
        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php 
  include ('config.php');

  if(isset($_POST['create'])){
   $Entreprise=$_POST['Entreprise'];
   $Adresse=$_POST['Adresse'];
   $Ville=$_POST['Ville'];
   $CP=$_POST['CP'];
   $Patent_no=$_POST['pn'];
   $Numero_de_telephone=$_POST['Num'];
   $E_mail=$_POST['email'];
   $Personne_de_Contact=$_POST['contact'];
   $Custumer_Number=$_POST['cn'];
   
   $paiement = $_POST['paiement'];
  $count="SELECT * FROM client where Custumer_number like '%$Custumer_Number%'";
  $result = mysqli_query($conn,$count);
 $rowcount = mysqli_num_rows($result);
 if($rowcount > 0){
$total= $Custumer_Number.$rowcount;
}else{
    $total = $Custumer_Number;
}
 
    $sql="insert into client (Entreprise,Adresse,Ville,Code_postal,patent_Number,Telephone,Contact,Custumer_number,Email,main_user,paiement) values ('$Entreprise','$Adresse','$Ville','$CP','$Patent_no','$Numero_de_telephone','$Personne_de_Contact','$total','$E_mail','$email','$paiement')";
    if (mysqli_query($conn, $sql)) { ?>
     <script>
alert('Client added successfully');
window.location.href = 'list-client.php';
</script>
<?php
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
  }
 
  ?>
  <script>
      $("#num").keyup(function(){
    $("#numcl").val(this.value);
});
 
  </script>
  <?php
include ('includes/footer.php');
?>