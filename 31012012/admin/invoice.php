<?php

ob_start();
session_start();
include "config.php";
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include 'invoice_class.php';
$email = $_SESSION['email'];
$sql = "select * from user where email='$email'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $entreprise = $row['Entreprise'];
    $adresse = $row['Adresse'];
    $Ville = $row['Ville'];
    $cp = $row['Code_postal'];
    $tva = $row['tva'];
}

$invoice = new Invoice();
if (!empty($_POST['companyName']) && $_POST['companyName'] && isset($_POST['invoice_btn'])) {
    $invoice->saveInvoice($_POST,$_SESSION['email']);
    include "stock_actions/connect.php";
    $id;
    $email = $_SESSION['email'];
    $query = "SELECT max(order_id) as id FROM invoice_order ";
    $invoice = $pdo->query($query);
    while ($row = $invoice->fetch()) {
        $id = $row['id'];
    }
    header("Location:print_invoice.php?invoice_id=$id");
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="https://2wahka.com/2wahka/admin/jquery-ui-1.13.2/jquery-ui.min.css">
    <link rel="stylesheet" href="https://2wahka.com/2wahka/admin/jquery-ui-1.13.2/jquery-ui.css">
    <script type="text/javascript" src="https://2wahka.com/2wahka/admin/jquery-ui-1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://2wahka.com/2wahka/admin/jquery-ui-1.13.2/jquery-ui.min.js"></script>





    <script>
    $(document).ready(function() {
        $('#companyName').keyup(function() {
            var sid = $(this).val();
            var data_String = 'sid=' + sid;
            $.get('search.php', data_String, function(result) {
                $.each(result, function() {
                    $('#adress').val(this.Adresse);
                    $('#ville').val(this.Ville);
                    $('#cp').val(this.Code_postal);

                });
            });
        });
    });
    </script>
    
    
    
</head>

<body>
                  <div class="breadcrumb-item" >
    <!-- <a href="https://2wahka.com/31012012/admin/index.php" style="float:right;">Home</a>-->
   
          </div>
    <div class="container-md container" style="margin-left:6%;">
        

        
        
        <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="" style="margin-top: 30px;
    margin-left:16%;">
            <div style="   margin-top: -20px;" class="row">
                <div class="col">
                    <!----          <h3>De,</h3>            --->
                    <?php echo " $entreprise"; ?><br>
                    <?php echo "$adresse"; ?><br>
                     <?php echo "$cp"; ?><br>
                    <?php echo "$Ville"; ?><br>
                   
                </div>

                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM client where idClient='$id'";
                    $invoice = $conn->query($query);
                } ?>



                <div class="col ">
                   <!-- <h3>À,</h3>--->

                    <?php if (isset($_GET['id'])) {
                        while ($row = $invoice->fetch_assoc()) { ?>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $row['Entreprise'] ?>" name="companyName"
                            id="companyName" placeholder="Company">
                    </div>
                    <div id="results"></div>
                    <div class="form-group ">
                        <input type="text " id="adress" class="form-control " value="<?= $row['Adresse'] ?>"
                            name="adresse" placeholder="Address ">
                    </div>
                     <div class="form-group ">
                        <input type="text " id="cp" class="form-control " value="<?= $row['Code_postal'] ?>" name="cp"
                            placeholder="Zip code ">
                    </div>
                    <div class="form-group ">
                        <input type="text " id="ville" class="form-control " value="<?= $row['Ville'] ?>" name="ville"
                            placeholder=" City ">
                    </div>
                   
                    <?php }
                    } else { ?>

                    <div class="form-group">
                        <input type="text" class="form-control" name="companyName" id="companyName"
                            placeholder="company">
                    </div>
                    <div id="results"></div>
                    <div class="form-group ">
                        <input type="text " id="adress" class="form-control " name="adresse" placeholder="Address ">
                    </div>
                    <div class="form-group ">
                        <input type="text " id="ville" class="form-control " name="ville" placeholder=" City ">
                    </div>
                    <div class="form-group ">
                        <input type="text " id="cp" class="form-control " name="cp" placeholder="Zip code ">
                    </div>

                    <?php } ?>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover" id="invoiceItem">
                        <tr>
                            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                            <th width="15%">Item Number</th>
                            <th width="27%">Item Name</th>
                            <th width="15%">Volume</th>
                            <th width="15%">Discount(%)</th>
                            <th width="15%">Price (MAD)</th>
                            <th width="25%">Total(MAD)</th>
                        </tr>
                        <tr>
                            <td><input class="itemRow" type="checkbox"></td>
                            <td><input type="number" name="productCode[]" id="productCode_1" class="form-control"
                                    required autocomplete="off"></td>
                            <td><input type="text" name="productName[]" readonly id="productName_1" class="form-control"
                                    autocomplete="off"></td>
                            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity"
                                    autocomplete="off"></td>
                            <td><input type="number" name="discount[]" id="discount_1" class="form-control discount"
                                    autocomplete="off"></td>
                            <td><input type="number" name="price[]" value="MAD" readonly id="price_1" class="form-control price"
                                    autocomplete="off"></td>
                            <td><input type="number" name="total[]" readonly id="total_1" class="form-control total"
                                    autocomplete="off" ></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-top:20px ;">
                <div class="col invoice-buttons">
                    <button class="btn btn-danger delete " id="removeRows" type="button"><i
                            class="fa-sharp fa-solid fa-trash"></i> Delete</button>
                    <button class="btn btn-success " id="addRows" type="button"><i
                            class="fa-sharp fa-solid fa-square-plus"></i> Add More</button>
                    <button class="btn btn-primary invoice-save-btm" type="button"><i
                            class="fa-solid fa-file-arrow-down"></i>Save / Close</button>
                    <div></div>
                    <!--<input style="" data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-primary submit_btn invoice-save-btm">		-->
                </div>
            </div>
            <div class="row save_invoice" style="margin-top: 90px; width:40% ">
 <button type="button" class="btn-close btn-close1" data-bs-dismiss="modal" aria-label="Close"></button>
                <p class="text-center">I want to :</p>

                <div class="print_button text-center">
                    <button class="btn btn-primary " formtarget="_blank" data-loading-text="Saving Invoice..." type="submit"
                        name="invoice_btn">Print</button>
                    <button class="btn btn-warning " type="button">Email </button>
                    <button class="btn btn-info " type="button">Whatsapp</button>
                </div>
            </div>

            <div class="row tvia" style="float:right;   margin-bottom: 15px;">
                <div class="col">


                    <label>Subtotal excluding VAT: &nbsp;(MAD)</label>
                    <div class="input-group">

                        <input value="" type="number" readonly class="form-control" name="subTotal" id="subTotal"
                            placeholder="Subtotal excluding VAT:">
                    </div>
<br>
                    <div class="form-group">
                        <label>VAT: &nbsp; (%)</label>
                        <div class="input-group">
                            <input value="<?php echo $tva ?>" type="number" readonly class="form-control" name="taxRate"
                                id="taxRate" placeholder="Tva">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Total VAT: &nbsp; (MAD)</label>
                        <div class="input-group">
                            <input type="number" readonly class="form-control" name="totalVAT" id="taxTotal"
                                placeholder="Total VAT">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subtotal vat included: &nbsp;(MAD)</label>
                        <div class="input-group">

                            <input value="" type="number" readonly class="form-control" name="totalAftertax"
                                id="totalAftertax" placeholder="Subtotal vat included: ">

                        </div>
                    </div>



                    </span>
                </div>

            </div>

    </div>


    </form>
    </div>

    <script src="includes/js.js"></script>
    <script>
    jQuery(function() {
        $("#companyName").autocomplete("auto.php");
        // }); < /body> <!--/.content - wrapper-- > < footer >


        //     <
        //     /footer>

        //     <
        //     /div>


        //     <
        //     !--jQuery UI 1.11 .4-- >

        //     <
        //     !--Resolve conflict in jQuery UI tooltip with Bootstrap tooltip-- >
        //     <
        //     script >
        //     $.widget.bridge('uibutton', $.ui.button)
        ///
    })

    $(document).on('blur', "[id^=productCode_]", function() {
        const item = $(this).val();
        const element = $(this).attr("id")
        $.ajax({
            type: "POST",
            url: `get_invoice.php?id=${item}`,
            data: {
                id: item,
                action: 'get_invoice'
            },
            success: function(response) {
                if (response == "-1") {
                    alert("This item is not exist !! must be change it")

                } else {
                    let items = JSON.parse(response)
                    const id = element.charAt(element.length - 1)

                    $("#productName_" + id).val(items.item_name);
                    $("#price_" + id).val(items.sale_price);
                     window.sessionStorage.setItem('stock', items.stock)
                }

            }
        });
    });

    $(".invoice-save-btm").on("click", function() {
        $(".save_invoice").css("display", "block")
        $(".tvia").css("margin-top", "-20%")

    })
    $(".btn-close1").on("click", function() {
        $(".save_invoice").css("display", "none")
        $(".tvia").css("margin-top", "0%")
    })

    ///
    </script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <!--<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>-->
    <!--<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
    <!-- jQuery Knob Chart -->
    <!--<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>-->
    <!-- daterangepicker -->
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <!--<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src=" assets/dist/js/adminlte.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            scrollY: 200,
            scrollX: true,
        });
    });
    </script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- AdminLTE for demo purposes -->

</body>

</html>