<?php
session_start();
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
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="col-md-8">
            <div class="row my-5">
                <div class="col-md-6 mx-auto">
                   
                </div>
            </div>
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3>Cree un Employee</h3>
                    
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="">
                       
                        <div class="form-group mb-3">
                            <label for="fullname" class="form-label fw-bold">Job</label>
                            <input type="text" name="Job" value="" placeholder="Job" class="form-control">
  
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" >Name</label>
                            <input type="text" name="Name" value=""  placeholder="Full name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="depart">Adresse</label>
                            <input type="text" class="form-control" value=""  name="Adresse" placeholder="Adresse">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" >Ville</label>
                            <input type="text" class="form-control" value=""  placeholder="Ville" name="Ville">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" >Code Postal</label>
                            <input type="text" class="form-control" value=""  placeholder="Code Postla" name="CP">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" >Cin</label>
                            <input type="text" class="form-control" value=""  placeholder="Cin" name="Cin">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Periode</label>
                            <input type="text" class="form-control" value=""  placeholder="Periode" name="Periode">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Numéro employé</label>
                            <input type="text" class="form-control" value=""  placeholder="Numéro employé" name="N_employe">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Date de disposition</label>
                            <input type="date" class="form-control" value=""  placeholder="Date_de_disposition" name="Datede_disposition">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Num account</label>
                            <input type="text" class="form-control" value=""  placeholder="Num account" name="N_account">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Num cnss</label>
                            <input type="text" class="form-control" value=""  placeholder="Num cnss" name="N_cnss">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Num cimr</label>
                            <input type="text" class="form-control" value=""  placeholder="Num cimr" name="N_cimr">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Num reglement</label>
                            <input type="text" class="form-control" value=""  placeholder="Num de reglement" name="N_reglement">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="create">
                                   Create
                                </button>
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
   $job=$_POST['Job'];
   $Name=$_POST['Name'];
   $Adresse=$_POST['Adresse'];
   $Ville=$_POST['Ville'];
   $CP=$_POST['CP'];
   $Cin=$_POST['Cin'];
   $Periode=$_POST['Periode'];
   $N_e=$_POST['N_employe'];
   $Date=$_POST['Datede_disposition'];
   $N_account=$_POST['N_account'];
   $cnss=$_POST['N_cnss'];
   $cimr=$_POST['N_cimr'];
   $N_reglement=$_POST['N_reglement'];
   $main_user=$_SESSION["email"];
   $count="select idEmployee from employee";
   $res=mysqli_query($conn,$count);
   if(mysqli_num_rows($res)>=3){
    echo '<script>alert("It is the max")</script>';
   }else{
    $sql="insert into employee (Job,Name,Adresse,Ville,Code_Postal,Cin,Numero_employe,Periode,Date_de_disposition,N_account,N_cnss,N_cimr,Numero_de_reglement,main_user) values ('$job','$Name','$Adresse','$Ville','$CP','$Cin','$N_e','$Periode','$Date','$N_account','$cnss','$cimr','$N_reglement','$main_user')";
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
   }
    
    


  }
  
  
  ?>
  
<?php
include ('includes/footer.php');
?>