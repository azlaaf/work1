<?php
ob_start();
   
session_start();



include('admin/config.php');
$email=$_SESSION['email'];
ob_end_flush();
?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    
  <title>2wahka</title>

   <!--Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!--Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!--Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
   <!--Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <!--Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!--JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
  <!--stock css -->
  <link rel="stylesheet" href="stock-asset/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1./jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  </head>


<div class="container-fluid">
    <div class="row" style="margin-left: 113px;
    margin-right: -115px;">
        
                <div class="col-md-8 mx-auto">
                     <a href="./research_pad_payer.php"> <button type="button" class="btn btn-info mx-2">
                <i class="fa-sharp fa-solid fa-circle-left"></i>
                go back</button></a>
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                    bad payer List 
                    </h3>
                </div>
               
                <div class="card-body">
                    
    <div class="table-responsive">
        
        <table id="employee_data" class="table table-striped table-bordered" style="overflow:hidden;.table::-webkit-scrollbar {
    display: none;
}">
            <thead>
                <tr>
                   
                    <th>Bad payer's full name</th>
                    <th>Last known address on the bad payer</th>
                    <th>Debt date</th>
                    <th>The size of the debt</th>
                    <th>CIN No</th>
                    <th>The debt concerns</th>
                    <th>The debt is due to</th>
                    <th>The debtor has been convicted in court</th>
                    <th>Court case number</th>
                    <th>The court's decision in "City"</th>                
                </tr>
            </thead>
            <tbody>
                <?php
                include('admin/config.php');
                $email=$_SESSION['email'];
                $idEmployee=$_GET['idClient'];
                $query = "SELECT * FROM badpayer  WHERE idClient=$idEmployee ";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()){
                
                    echo '<tr>';
                   
                    echo"<td>".$row['a']."</td>";
                    echo"<td>".$row['b']."</td>";
                    echo"<td>".$row['c']."</td>";
                    echo"<td>".$row['d']."</td>";
                    echo"<td>".$row['e']."</td>";
                    echo"<td>".$row['f']."</td>";
                    echo"<td>".$row['g']."</td>";
                    echo"<td>".$row['h']."</td>";
                    echo"<td>".$row['i']."</td>";
                    echo"<td>".$row['j']."</td>";
// echo  '<a href="view.php?id='.$row['idEmployee'].'"
//       class="btn btn-sm btn-primary">
//       <i class="fas fa-eye"></i>
//   </a>';
                    echo '</tr>';
                }
                ?>
            </tbody>

        </table>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
    $('#employee_data').DataTable({
        scrollY: false,
        scrollX: false,
        deferRender:true,
        scrollCollapse: false,
        paging: false,
        scroller: true,

    });
});
</script>
                </div>
</div>

