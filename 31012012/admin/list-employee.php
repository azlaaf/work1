<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>



<div class="container-fluid overflow-hidden">
    <div class="row" style="margin-left: 113px;margin-right: -115px;">
        
                <div class="col-md-8 mx-auto">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                       Employee List
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
        <table id="employee_data" class="table table-striped table-bordered" style="overflow:hidden;.table::-webkit-scrollbar {display: none;}">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Cin</th>
                    <th width='30%'>Employee No</th>
                    <th width='10%'>Statut</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                <?php
                include('config.php');
                $email=$_SESSION['email'];
                $query = "SELECT * FROM employee where main_user='$email' ";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()){
                
                    echo '<tr>';
                    echo '<td>';
                    echo '<input class="formcontrol imperimer_check" type="checkbox" name="employee_check"
                     value=' . $row['idEmployee'] . '>';
                    echo"<td>".$row['idEmployee']."</td>";
                    echo"<td>".$row['Job']."</td>";
                    echo"<td>".$row['Name']."</td>";
                    echo"<td>".$row['Ville']."</td>";
                    echo"<td>".$row['Cin']."</td>";
                    echo"<td width='10%' >".$row['Numero_employe']."</td>";
                    echo"<td width='10%'>".$row['statut']."</td>";
                    
                     

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
    
    $("input[type='search']").attr("placeholder", "  search by lastname");
    $("#employee_data_info").text(`${$("#employee_data_info").text().replace("entries", "Total")}`);
});


$("#edit_employee").click(function() {
            $.each($("input[name='employee_check']:checked"), function() {
                if ($("input[name='employee_check']:checked").length === 1) {
                    const res = window.location.href.charAt(window.location.href.length - 1);
                   // console.log(res)
                    let courentUrl = "";
                    if (res === "#") {
                        courentUrl = window.location.href.slice(0, -14)
                    } else {
                        courentUrl = window.location.href.slice(0, -15)
                    }
                    window.location.replace(
                        `edit.php?idEmployee=${$(this).val()}`)
                }
            })
             if ($("input[name='employee_check']:checked").length > 1) {
                    alert("you can't edit more than one employee at the same time"
                    )
                }

            if ($("input[type='checkbox']:checked").length === 0) {
                alert("you must select one employee to edit")
            }
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






<?php
include ('includes/footer.php');
?>