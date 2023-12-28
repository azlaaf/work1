<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>



<div class="container-fluid">
    <div class="row" style="margin-left: 113px;
    margin-right: -115px;">
        
                <div class="col-md-8 mx-auto">
                     <a href="./control.php"> <button type="button" class="btn btn-info mx-2">
                <i class="fa-sharp fa-solid fa-circle-left"></i>
                go back</button></a>
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
Overview employee vacation, illness
                    </h3>
                </div>
               
                <div class="card-body">
                    
    <div class="table-responsive">
        
        <table id="employee_data" class="table table-striped table-bordered" style="overflow:hidden;.table::-webkit-scrollbar {
    display: none;
}">
            <thead>
                <tr>
                   
                    <th>Name</th>
                    <th>Title</th>
                    <th style="width:20%;" >Description</th>
                    <th>Start</th>
                    <th>End</th>
                   
                   
                   
                </tr>
            </thead>
            <tbody>
                <?php
                include('config.php');
                $email=$_SESSION['email'];
                $idEmployee=$_GET['idEmployee'];
                $query = "SELECT * FROM employee x,schedule_list y where x.idEmployee=y.idEmployee and x.idEmployee=$idEmployee and main_user='$email'; ";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()){
                
                    echo '<tr>';
                   
                    echo"<td>".$row['Name']."</td>";
                    echo"<td>".$row['title']."</td>";
                    echo"<td>".$row['description']."</td>";
                    echo"<td>".$row['start_datetime']."</td>";
                    echo"<td>".$row['end_datetime']."</td>";
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






<?php
include ('includes/footer.php');
?>