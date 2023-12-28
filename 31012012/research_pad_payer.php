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

<div class="container-fluid overflow-hidden">
    <div class="row" style="margin-left: 113px;margin-right: -115px;">
        <div class="col-md-8 mx-auto">
            <div class="card-header">
                <h3 class="text-center text-uppercase">
                <!--Enregistrements d'heurs -->
                bad payer List 
                </h3>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="employee_data" class="table table-striped table-bordered" width='100%'>
                        <?php
                        echo " <thead>";
                        echo "<tr>";
                        echo "<th width='60px'>ID</th>";
                        echo "<th width='60px'>Company/Name</th>";
                        echo "<th>Cin/Patent</th>";
                        echo "<th>City</th>";
                        echo "<th>Address</th>";
                        echo "<th>Details</th>";
                        echo " </tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        include('admin/config.php');
                        $email = $_SESSION['email'];
                        $query = "SELECT * FROM badpayer ";
                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) { ?>
                          <tr>
                            <td width='60px'>
                                <?= $row['idClient'] ?>
                            </td>
                            <td width='60px'>
                                <?= $row['a'] ?>
                            </td> 
                            <td width='60px'>
                                <?= $row['e'] ?>
                            </td>
                             <td width='60px'>
                                <?= $row['b'] ?>
                            </td> 
                            <td width='60px'>
                                <?= $row['b'] ?>
                            </td>
                         
                            <td >
                                <a href="details_conge.php?idClient=<?php echo $row['idClient']?>"> <span class="fa fa-eye" aria-hidden="true"></span> Details </a> 
                            </td>
                            </tr>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                            
        <script>
        $(document).ready(function() {
            $('#employee_data').DataTable({
                scrollY: '200',
                scrollX: true,
                deferRender: true,
                scrollCollapse: true,
                paging: false,
                scroller: true,
            });
            $("input[type='search']").attr("placeholder", "search by lastname")
        });
        // edit client
        </script>
    </div>
</div>
</html>
