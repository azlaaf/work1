<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>
<?php
$id=$_GET['id'];
$sql="select * from client where idClient='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
$idClient=$row['idClient'];
$Entreprise=$row['Entreprise'];
$Adresse=$row['Adresse'];
$patent_Number=$row['patent_Number'];
$Ville=$row['Ville'];
$CP=$row['Code_postal'];
$Telephone=$row['Telephone'];
$Contact=$row['Contact'];
$Custumer_number=$row['Custumer_number'];
$email=$row['Email'];
}
?>
<!------    aea       ---->

<div class="row mb-2">
          <div 
 class="col-sm-6">
         
          </div><!-- /.col -->
        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="https://2wahka.com/31012012/admin/index.php">Home</a></li>-->
              <!--<li class="breadcrumb-item active">Dashboard customer creation</li>-->
          <!--  </ol>-->
          </div><!-- /.col -->
<!----------end tst ------------>


<div style="margin-left: 185px; margin-top: -55px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row my-5">
                <div class="col-md-6 mx-auto">
                   
                </div>
            </div>
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        Update Customer Information
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="">
            <div class="container">
            <div class="row">
                        <div class="col form-group mb-3">
                            <label for="fullname" class="form-label fw-bold">Company</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's company name">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" name="Entreprise" value="<?php echo $Entreprise ?>" placeholder="Company" class="form-control" style="width:75%;">
  
                        </div>
                     
                        <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" for="depart">Address
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's company address">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            <input type="text" class="form-control" value="<?php echo $Adresse ?>"  name="Adresse" placeholder="Address" style="width:75%;">
                        </div>
            </div>
            <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" >City</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's city name">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" class="form-control" value="<?php echo $Ville ?>"  name="Ville" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" >Zip Code
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's zip code ">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            
                            <input type="text" class="form-control" value="<?php echo $CP ?>"  name="CP" style="width:75%;">
                        </div>
            </div>
            <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" >Num de Patente</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's patent number [Note: it can not be changed once submitted]">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="text" class="form-control" value="<?php echo $patent_Number ?>" name="Patent_no" disabled style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" for="city">Phone Number
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's phone number">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            
                            <input type="number" class="form-control" value="<?php echo $Telephone ?>"  name="Telephone" style="width:75%;">
                        </div>
            </div>
            <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="city">Email</label>
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The E-mail of the customer to send docs to it">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            <input type="email" class="form-control" value="<?php echo $email ?>"   name="email" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" for="city">Contact Person
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The customer's company manager name">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            <input type="text" class="form-control" value="<?php echo $Contact ?>"   name="Contact" style="width:75%;">
                        </div>
            </div>
            <div class="row">
                        <div class="col form-group mb-3">
                            <label class="col form-label fw-bold" for="city">Customer Number
                            <span class="details">
                            <a style="color:black;" href="#" data-toggle="tooltip" title="[Note: the customer's number can not be changed]">
                                <i class="fa fa-question-circle" ></i></a>
                            </span>
                            </label>
                            <input type="text" class="form-control" readonly value="<?php echo $Custumer_number ?>"   name="Custumer_number" style="width:37%;">
                        </div>
                        
            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="sub">
                                   Update
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
<?php
include('config.php');
$id=$_GET['id'];
@$Entreprise=$_POST['Entreprise'];
@$patent_Number=$_POST['Patent_no'];
@$Ville=$_POST['Ville'];
@$CP=$_POST['Code_postal'];
@$Telephone=$_POST['Telephone'];
@$Contact=$_POST['Contact'];
@$Custumer_number=$_POST['Custumer_number'];
@$email=$_POST['email'];

if(isset($_POST['sub'])){
$sql="UPDATE client SET Entreprise='$Entreprise',Adresse='$Adresse',Ville='$Ville' ,Code_postal='$CP',Telephone='$Telephone',Contact='$Contact',Custumer_number='$Custumer_number',Email='$email' where idClient='$id'";
    if (mysqli_query($conn, $sql)) {
      ?>
      <script>
        alert('Update success');
        window.location.href='list-client.php';
      </script>
      <?php
      
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    


  }

?>


<?php
include ('includes/footer.php');
?>
