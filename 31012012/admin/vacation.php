<?php
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
<form method="$_POST" action="vacation-p.php">
  <div class="form-group" >
    <label for="exampleInputEmail1">Demande de congé</label>
    <input  name="name" type="text" class="form-control"   placeholder="Entrer votre nom complete "><br>
    <input name="dep" type="text" class="form-control"   placeholder="Entrer departement"><br>
    <input name="num" type="text" class="form-control"   placeholder="Entrer numero de compte"><br>
    <input name="fin" type="date" class="form-control"   placeholder="Entrer date de fin"><br>
    <input name="depart" type="date" class="form-control"   placeholder="Entrer date de depart">

    
   
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
 
                </div>
            </div></div></div></div>
            <?php
include ('includes/footer.php');
?>