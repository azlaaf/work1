<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
?>
<style>
    .section { 
    width: 100vw; 
    height: 100vh !important; 
    z-index: 1; 
    max-width: 100%; 
}
</style>


<div class="container-fluid overflow-hidden">
    <div class="row" style="margin-left: 113px;
    margin-right: -115px;">

        <div class="col-md-8 mx-auto">
            <div class="card-header">
                <h3 class="text-center ">
                    <span class="text-uppercase">Customer</span> LIST
                </h3>
            </div>
            <div class="invoice-buttons ">
                <a href="#" class="btn btn-sm btn-warning mx-2" id="edit_client">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="#" class="btn btn-sm btn-danger" id="delete_client">
                    <i class="fas fa-trash"></i> Delete
                </a>
                <a href="#" class="btn btn-sm text-dark bg-primary" id="add_invoice">
                    New Invoice
                </a>
                <!-- <span style="border-radius: 5px;" class="bg-primary text-dark">New</span>Invoice</a> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="employee_data" class="table table-striped table-bordered" width='100%'>
                        <?php
                        echo " <thead>";
                        echo "<tr>";
                        echo "<th></th>";
                        echo "<th width='60px'>Entreprise</th>";
                        echo "<th width='60px'>Adresse</th>";
                        echo "<th>Ville</th>";
                        echo "<th>Telephone</th>";
                        echo "<th>Contact</th>";
                        echo "<th>Stats</th>";
                        


                        echo " </tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        include('config.php');
                        $email = $_SESSION['email'];
                        $query = "SELECT * FROM client where main_user='$email'";
                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            
                             echo '<td class="text-center">';
                            echo '<input class="formcontrol imperimer_check" type="checkbox" name="client_check"
                            value=' . $row['idClient'] . '>';
                            echo "<td width='60px'>" . $row['Entreprise'] . "</td>";
                            echo "<td width='60px'>" . $row['Adresse'] . "</td>";
                            echo "<td>" . $row['Ville'] . "</td>";


                            echo "<td>" . $row['Telephone'] . "</td>";
                            echo "<td>" . $row['Contact'] . "</td>";
                            echo '<td><a href="client_stat.php?email=' . $row['Adresse'] . '&entr=' . $row['Entreprise'] . '"><i class="fa-sharp fa-solid fa-eye"></i></a></td>';


                           
                            echo '</tr>';
                        }
                        ?>
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
            $("input[type='search']").attr("placeholder", "   search by company");
            $("#employee_data_info").text(`${$("#employee_data_info").text().replace("entries", "Total")}`);
        });
        // edit client 

        $("#edit_client").click(function() {
            $.each($("input[name='client_check']:checked"), function() {
                if ($("input[name='client_check']:checked").length === 1) {
                    const res = window.location.href.charAt(window.location.href.length - 1);
                    // console.log(res)
                    let courentUrl="";
                    if (res === "#") {
                        courentUrl = window.location.href.slice(0, -16);
                    } else {
                        courentUrl = window.location.href.slice(0, -15);
                    }
                    window.location.replace(courentUrl +
                        `edit-client.php?id=${$(this).val()}`);
                }
            });
             if ($("input[name='client_check']:checked").length > 1) {
                alert("you can't edit more than one client at the same time");
            }
            if ($("input[type='checkbox']:checked").length === 0) {
                alert("you must select one client to edit");
            }
        });
        //
        // delite client 
        $("#delete_client").click(function() {
            $.each($("input[name='client_check']:checked"), function() {
                 if (confirm("do you really want to delete this client ? ")) {
                if ($("input[name='client_check']:checked").length === 1) {
                    const res = window.location.href.charAt(window.location.href.length - 1);
                    // console.log(res)
                    let courentUrl="";
                    if (res === "#") {
                        courentUrl = window.location.href.slice(0, -16);
                    } else {
                        courentUrl = window.location.href.slice(0, -15);
                    }
                    window.location.replace(courentUrl +
                        `delete-client.php?id=${$(this).val()}`);
                }
                 }
            });
        });
        ///
        // add invoice 
        $("#add_invoice").click(function() {
            $.each($("input[name='client_check']:checked"), function() {
                if ($("input[name='client_check']:checked").length === 1) {
                    const res = window.location.href.charAt(window.location.href.length - 1);
                    // console.log(res)
                    let courentUrl = "";
                    if (res === "#") {
                        courentUrl = window.location.href.slice(0, -16);
                    } else {
                        courentUrl = window.location.href.slice(0, -15);
                    }
                    window.location.replace(courentUrl +
                        `invoice.php?id=${$(this).val()}`);
                }
            });
        });
        //
        </script>
    </div>
</div>

<?php
include ('includes/footer.php');
?>