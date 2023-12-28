<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
?>
<?php 
include('config.php');
$id=$_GET['id'];
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

}

?>
<div style="margin-left: 185px;
    margin-top: -35px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        Profile : <?php echo $Name ?>
                    </h3>
                </div>
                <div class="card-body">
                   
                    <hr>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Id Employé</label>
                        <div class="border border-secondary rounded p-2">
                            <?php echo $idEmploye ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold"> Emploi </label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Job ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Nom</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Name ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold"> Adresse</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Adresse ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Ville</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Ville ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Code Postal</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $CP ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Cin</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Cin ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Période</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Période ?>
                        </div>
                        <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Numéro d'employé</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Numéro_employé ?>
                        </div>
                        <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Date de début de travail</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Date_de_disposition ?>
                        </div>
                        <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Num de compte</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $N_account ?>
                        </div>
                        <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Num Cnss</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $N_cnss ?>
                        </div>
                        <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Num Cimr</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $N_cimr ?>
                        </div>
                        <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Numero de réglement</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $Numéro_de_règlement ?>
                        </div>
                         <div class="form-group mb-3">
                        <label for="fullname" class="form-label fw-bold">Bank</label>
                        <div class="border border-secondary rounded p-2">
                        <?php echo $bank ?>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include ('includes/footer.php');
?>
