<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>
<html>
  <head>
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
                Time Registrations
                </h3>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="employee_data" class="table table-striped table-bordered" width='100%'>
                        <?php
                        echo " <thead>";
                        echo "<tr>";
                        echo "<th width='30%'>Name</th>";
                        echo "<th width='15%'>Hours Per Week</th>";
                        echo "<th width='15%' >Correction</th>";
                        echo "<th width='15%' >Confirm</th>";
                        echo "<th >Holiday</th>";
                        echo "<th >Details</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        include('config.php');
                        $email = $_SESSION['email'];
                        $query = "SELECT * FROM employee where main_user='$email'";
                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) { ?>
                          <tr>
                            <td width='60px'>
                                <?= $row['Name'] ?>
                            </td>
                            <td width='60px'>
                                <?= $row['Periode'] ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary mx-2" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['idEmployee']?>">
                                    <span class="glyphicon glyphicon-edit"></span>Edit
                                </a>
                               <!-- <a href="salary.php?idEmployee=<?php echo $row['idEmployee']?>" class="btn btn-sm btn-primary mx-2"> <i class="fas fa-share"></i> </a>-->
                            </td>
                            <td>
                                <input type="text" name=""  value="<?php echo $row['Periode'] ?> " style="width: 40px;" disabled>
                                <a href="salary.php?idEmployee=<?php echo $row['idEmployee']?>" class="btn btn-sm btn-primary mx-2"> <i class="fas fa-share"></i> </a>
                            </td>
                            <td>
                                <a href="add_conge.php?idEmployee=<?php echo $row['idEmployee']?>"> <span class="fas fa-plus"></span> Add</a>
                            </td>
                            <td >
                                <a href="details_conge.php?idEmployee=<?php echo $row['idEmployee']?>"> <span class="fa fa-eye" aria-hidden="true"></span> Details </a> 
                            </td>
                            </tr>
                            <?php include 'update_hour.php'; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <?php
          if(ISSET($_POST['update'])){
            $idEmployee = $_POST['idEmployee'];
            $Periode = $_POST['Periode'];
            $Vacation = $_POST['Vacation'];
            $sql="UPDATE `employee`
             SET `Periode` = '$Periode' ,
              `Vacation` = '$Vacation'
              WHERE `idEmployee` = '$idEmployee'" ;
    if (mysqli_query($conn, $sql)) {
      ?>
      <script>
        alert('Update success');
        window.location.href='control.php';
      </script>
      <?php
      
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
          
          ?>                
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
            $("input[type='search']").attr("placeholder", "search by lastname");
            $("#employee_data_info").text(`${$("#employee_data_info").text().replace("entries", "Total")}`);
        });
        // edit client
        
        </script>
    </div>
</div>
</html>

<?php
include ('includes/footer.php');
?>