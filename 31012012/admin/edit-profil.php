<?php
session_start();
$email=$_SESSION['email'];
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>
<?
$query = "SELECT * FROM user where email='$email'";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
    $entreprise=$row['Entreprise'];
    $Adresse=$row['Adresse'];
    $Ville=$row['Ville'];
    $Code_postal=$row['Code_postal'];
    $patent=$row['patent_Number'];
    $cnss=$row['CNSS'];
    $N_CNSS=$row['N_d_CNSS'];
    $taxe=$row['N_de_taxe_proff'];
    $phone=$row['phone'];
    $bank=$row['bank'];
    $rib=$row['rib'];
    $tva=$row['tva'];
}

?>
<script>
        function side(){
          
document.getElementsByClassName("sidebar-mini layout-fixed sidebar-open").classList.toggle('sidebar-mini layout-fixed sidebar-closed sidebar-collapse');
        }
    </script>
    <body onLoad="side()";>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!--<div class="col-sm-6">-->
          <!--  <h1 class="m-0">Tableau de bord</h1>-->
          <!--</div>-->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
              <!--<li class="breadcrumb-item active">Tableau de bord v1</li>-->
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
   
                <div class="container">
    <div class="row justify-content-center" style="
    margin-top: -85px;">
        <div class="col-md-8">
            <div class="row my-5">
                <div class="col-md-6 mx-auto">
                   
                </div>
            </div>
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3>Edit Company</h3>
                    
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" enctype="multipart/form-data">
                       <div class="container">
                           <div class="row">
                        <div class="col form-group mb-3">
                            
                            <label for="fullname" class="form-label fw-bold">Company
                            <a style="color:black;" href="#" data-toggle="tooltip" title="The name of the company"><i class="fa fa-question-circle" ></i></a>
                            </label>
                            <input type="text" name="Entreprise" value="<? echo $entreprise ?>" placeholder="Company" class="form-control" style="width:75%;">
  
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="depart">Adresse
                             <a style="color:black;" href="#" data-toggle="tooltip" title="The address of the company"><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $Adresse ?>"  name="Adresse" placeholder="Address" style="width:75%;">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" >City
                             <a style="color:black;" href="#" data-toggle="tooltip" title="The name of the city"><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $Ville ?>"  placeholder="City" name="Ville" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" >ZIP Code
                             <a style="color:black;" href="#" data-toggle="tooltip" title="The zip code according to city"><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $Code_postal ?>"  placeholder="ZIP Code" name="CP" style="width:75%;">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" >Patent Number
                             <a style="color:black;" href="#" data-toggle="tooltip" title="Patent number, you can find it at your RC.[Note: Patent number can't be changed]"><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" readonly value="<? echo $patent ?>"  placeholder="Patent Number" name="pn" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="city">Cnss
                             <a style="color:black;" href="#" data-toggle="tooltip" title="Social Security Number [Note : the number can't be changed]. If your company does not have CNSS"><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $cnss ?>"  placeholder="CNSS Number" name="cnss" style="width:75%;">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="city">CNSS Number
                             <a style="color:black;" href="#" data-toggle="tooltip" title=""><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $N_CNSS ?>"  placeholder="Patent Number" name="n_cnss" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="city">Num Tax Proff
                             <a style="color:black;" href="#" data-toggle="tooltip" title=""><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $taxe ?>"  placeholder="TAX Number" name="tax" style="width:75%;">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="city">Email
                             <a style="color:black;" href="#" data-toggle="tooltip" title="The E-mail you wish to use><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $email ?>"  placeholder="Email" name="email" style="width:75%;">
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="city">Numero de telephone
                             <a style="color:black;" href="#" data-toggle="tooltip" title="The number phone of the company"><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $phone ?>"  placeholder="Phone Number" name="phone" style="width:75%;">
                        </div>
                        <div class="row">
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="banque">Banque
                             <a style="color:black;" href="#" data-toggle="tooltip" title="The name of the bank"><i class="fa fa-question-circle" ></i></a></label>
                            <!--<input type="text" class="form-control" value="<? echo $bank ?>"  placeholder="Bank" name="bank" style="width:75%;">-->
                            <select name="bank" id="banque" style="display: block;
                                                    width: 75%;
                                                    height: calc(2.25rem + 2px);
                                                    padding: 0.375rem 0.75rem;
                                                    font-size: 1rem;
                                                    font-weight: 400;
                                                    line-height: 1.5;
                                                    color: #495057;
                                                    background-color: #fff;
                                                    background-clip: padding-box;
                                                    border: 1px solid #ced4da;
                                                    border-radius: 0.25rem;
                                                    box-shadow: inset 0 0 0 transparent;">
                                                <option value="N/A">N/A</option>
                                                <option value="<? echo $bank ?>" selected><?= $bank?></option>
                                                <option value="Banque Populaire" >Banque Populaire</option>
                                                <option value="Attijariwafa Bank">Attijariwafa Bank</option>
                                                <option value="Bank of Africa">Bank of Africa</option>
                                                <option value="Société générale Maroc">Société générale Maroc</option>
                                                <option value="BMCI">BMCI</option>
                                                <option value="Crédit agricole du Maroc">Crédit agricole du Maroc
                                                </option>
                                                <option value="Crédit du Maroc">Crédit du Maroc</option>
                                                <option value="CIH Bank">CIH Bank</option>
                                                <option value="CFG Bank">CFG Bank</option>
                                                <option value="Arab Bank Maroc">Arab Bank Maroc</option>
                                                <option value="Banco Immobiliario & Mercantil de Marruecos">Banco
                                                    Immobiliario & Mercantil de Marruecos</option>
                                                <option value="Bank Al Amal">Bank Al Amal</option>
                                                <option value="Bex-Maroc">Bex-Maroc</option>
                                                <option value="Caisse Interprofessionnelle Marocaine de Retraites">
                                                    Caisse Interprofessionnelle Marocaine de Retraites</option>
                                                <option value="Caisse Marocaine des Marches">Caisse Marocaine des
                                                    Marches</option>
                                                <option value="Caisse Mutualiste Interprofessionelle">Caisse Mutualiste
                                                    Interprofessionelle</option>
                                                <option value="Caisserie Commerciale">Caisserie Commerciale</option>
                                                <option value="Citibank Maghreb">Citibank Maghreb</option>
                                                <option value="Limar Bank Casa Union Marocaine de Banques">Limar Bank
                                                    Casa Union Marocaine de Banques</option>
                                                <option value="Raw-Mat Bank">Raw-Mat Bank</option>
                                                <option value="Societe de Banque & de Credit">Societe de Banque & de
                                                    Credit</option>
                                                <option value="Societe Mithaq Al Maghreb">Societe Mithaq Al Maghreb
                                                </option>
                                                <option value="Union Bancaria Hispano Marroqui Uniban">Union Bancaria
                                                    Hispano Marroqui Uniban</option>
                                                <option value="Union Marocaine de Banques">Union Marocaine de Banques
                                                </option>
                                                <option value="Banque Commerciale du Maroc">Banque Commerciale du Maroc
                                                </option>
                                                <option value="Banque Marocaine pour l'Afrique et l'Orient">Banque
                                                    Marocaine pour l'Afrique et l'Orient</option>
                                                <option value="Banque Nationale pour le Developpement Economique">Banque
                                                    Nationale pour le Developpement Economique</option>
                                                <option value="Societe Marocaine de Depot et Credit">Societe Marocaine
                                                    de Depot et Credit</option>
                                                <option value="Wafabank">Wafabank</option>
                                            </select>
                        </div>
                        <div class="col form-group mb-3">
                            <label class="form-label fw-bold" for="city">Rib
                             <a style="color:black;" href="#" data-toggle="tooltip" title="The rib is the the bank account number"><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $rib ?>"  placeholder="Bank Account Number" name="rib" style="width:75%;">
                        </div>
                        </div>
                         <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">Tva
                             <a style="color:black;" href="#" data-toggle="tooltip" title=""><i class="fa fa-question-circle" ></i></a></label>
                            <input type="text" class="form-control" value="<? echo $tva ?>"  placeholder="Tva" name="tva" style="width:35%;">
                        </div>
                  
                        </div>
                        
                             <div class="input-box">
                                <span class="details"> updated logo
                                <a style="color:black;" href="#" data-toggle="tooltip" title="upload your company's logo image"><i class="fa fa-question-circle" ></i></a>
                                </span><br>
                                <input type="file" name="logo">
                                <br>
                                <br>
                           </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="modify">
                                   Modifier
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
  </body>
  <?php
  @$entreprise=$_POST['Entreprise'];
    @$Adresse=$_POST['Adresse'];
    @$Ville=$_POST['Ville'];
    @$Code_postal=$_POST['CP'];
    @$patent=$_POST['pn'];
    @$cnss=$_POST['cnss'];
   @ $N_CNSS=$_POST['n_cnss'];
    @$taxe=$_POST['tax'];
   @ $phone=$_POST['phone'];
   @$rib=$_POST['rib'];
   @$bank=$_POST['bank'];
   $img_upload_path="";
  
  if(isset($_POST['modify'])){
       $img_name = $_FILES['logo']['name'];
         $tmp_name = $_FILES['logo']['tmp_name'];
         $error = $_FILES['logo']['error'];
         
         
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
$sql="update user set Entreprise='$entreprise',Adresse='$Adresse',Ville='$Ville',Code_postal='$Code_postal',patent_Number='$patent',CNSS='$cnss',N_d_CNSS='$N_CNSS',N_de_taxe_proff='$taxe',phone='$phone',bank='$bank',rib='$rib',logo='$img_upload_path' where email='$email'";
if(mysqli_query($conn,$sql)){
    ?>
     <script>
        alert('Successful update');
        window.location.href='edit-profil.php';
      </script>
    <?php
}
    else{
        echo("error");
    }
}
  ?>
 <?php
include ('includes/footer.php');
?>