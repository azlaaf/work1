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
   <style>
   input[type="checkbox"] {
height:1.5em;
width:1.5em;
cursor:pointer;
position:relative;
-webkit-transition: .10s;
border-radius:4em;
background-color:green;
color: white;
}
  </style>
  
  </head>


<div class="container-fluid overflow-hidden">
    <div class="row" style="margin-left: 113px;
    margin-right: -115px;">

        <div class="col-md-8 mx-auto">
            <div class="card-header">
                <h3 class="text-center text-uppercase">
                Had been working today
                </h3>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="employee_data" class="table table-striped table-bordered" width='100%' height='20px' ">
                        <?php
                        echo " <thead>";
                        echo "<tr>";
                        echo"<th>ID</th>";
                        echo "<th>Employee</th>";
                        echo "<th width='140px'>Check in Time</th>";
                        echo "<th width='140px'>Check out Time</th>";
                         echo "<th width='140px'>Validation</th>";
                        echo " </tr>";
                        echo "</thead>";
                         echo "<tbody>";
                        include('config.php');
                        $email = $_SESSION['email'];
                        $query = "SELECT * FROM Check_IN x,employee y,Check_OUT z where x.idEmployee=y.idEmployee and x.idEmployee=z.idEmployee  
                        and x.date_check_IN= CURDATE() and z.date_check_OUT= CURDATE() and main_user='$email';";
                        $result = $conn->query($query);
                        while ($row=$result->fetch_assoc()) { ?>
                          <tr>
                          <td>
                          <?=$row['idcheck']?>
                          </td>
                            <td >
                                <?= $row['Name'] ?>
                            </td>
                            <td >
                            <?= $row['Check_IN'] ?>
                            </td>
                            
                            <td>
                            <?= $row['Check_OUT'] ?>
                            </td>
                            <td >
                            <input style="position: relative; left:30px;" type="checkbox" width="20px">
                            </td>
                            </tr>
                            <?php }?>
                    </table>
                </div><br>
                <div class="col">
                 <button type="button" class="btn btn-outline-primary">Send to Checkup</button>
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
      

     
        </script>
        
    </div>
</div>


</html>


<?php
include ('includes/footer.php');
?>