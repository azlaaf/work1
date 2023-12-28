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

</head>


<style type="text/css">

tnody,td {

height: 70px;
}

</style>

<div class="container-fluid overflow-hidden">
    <div class="row" style="margin-left: 113px;
    margin-right: -115px;">
        
                <div class="col-md-8 mx-auto">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                    bad payer List 
                    </h3>
                </div>
                <div class="invoice-buttons ">
                <a href="#" class="btn btn-sm btn-warning mx-2" id="edit_employee">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="#" class="btn btn-sm btn-danger" id="delete_employee">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </div>
                <div class="card-body">
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered" style="overflow:hidden;.table::-webkit-scrollbar {
    display: none;
}">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Company/Name</th>
                    <th>Cin/Patent</th>
                    <th>City</th>
                    <th>Address</th>
     
                    
                </tr>
            </thead>
            <tbody>
                <?php
                include('admin/config.php');
                $email=$_SESSION['email'];
                $query = "SELECT * FROM badpayer  ";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()){
                
                    echo '<tr>';
                    echo '<td>';
                    echo '<input class="formcontrol imperimer_check" type="checkbox" name="employee_check"
                     value=' . $row['idClient'] . '>';
                    echo"<td>".$row['idClient']."</td>";
                    echo"<td>".$row['a']."</td>";
                    echo"<td>".$row['e']."</td>";
                    echo"<td>".$row['b']."</td>";
                    echo"<td>".$row['b']."</td>";

                    
                     

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
    
    $("input[type='search']").attr("placeholder", "  search by lastname")
});


$("#edit_employee").click(function() {
            $.each($("input[name='employee_check']:checked"), function() {
                if ($("input[name='employee_check']:checked").length === 1) {
                    const res = window.location.href.charAt(window.location.href.length - 1);
                   // console.log(res)
                    let courentUrl="";
                    if (res === "#") {
                        courentUrl = window.location.href.slice(0, -14)
                    } else {
                        courentUrl = window.location.href.slice(0, -15)
                    }
                    window.location.replace(
                        `edit.php?idClient=${$(this).val()}`)
                }
            })
        });
       
        $("#delete_employee").click(function() {
            $.each($("input[name='employee_check']:checked"), function() {
                if (confirm("do you really want to delete this employee ? ")) {
                    if ($("input[name='employee_check']:checked").length === 1) {
                        const res = window.location.href.charAt(window.location.href.length - 1);
                        // console.log(res)
                        let courentUrl = "";
                        if (res === "#") {
                            courentUrl = window.location.href.slice(0, -16)
                        } else {
                            courentUrl = window.location.href.slice(0, -15)
                        }
                        window.location.replace(
                            `delete.php?id=${$(this).val()}`)
                    }
                }
            })
        });
</script>
                </div>
</div>





