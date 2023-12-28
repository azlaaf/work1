<?php session_start();
include('config.php');
include("includes/header.php");
include('includes/topbar.php');
include('includes/sidebar.php');
include './stock_actions/receive_action.php';
include('./stock_actions/connect.php');
$id = $_GET['id'];
$qury = $pdo->query("SELECT stock FROM stock_items WHERE id_item=$id ");
$row = $qury->fetch(PDO::FETCH_BOTH);
$n = $row['stock'];
?>
<style>
.receive {
    width: 80%;
    margin-left: 10% !important;
}

/*.receive input {*/
/*    width: 40%;*/

/*}*/
</style>
<div class="content-wrapper">
    <div class="container mt-5">
        
        
                  <!--- ***********      ***********--->
          
                                          <div class="breadcrumb-item" >
     <a href="https://2wahka.com/31012012/admin/index.php" style="float:right;">Home</a>
   
          </div>
          
          <!---*******     ****************---->
        
        
        <a href="./gestion-stock.php"> <button type="button" class="btn btn-info mx-2">
                <i class="fa-sharp fa-solid fa-circle-left"></i>
                go back</button></a>
        <h3 class="text-center">Receipt of goods</h3>
        <hr>
        <div class="receive container">
            <div class="<?= $error ? "alert alert-danger" : "none1" ?>">
                <?= $error ?></div>
            <div class="<?= $msg ? "alert alert-success" : "none1" ?>"> <?= $msg ?>
            </div>
            <form method="POST" class="mt-4">

                <div class="mb-3 row justify-content-center">
                    <label for="PCS.Rescived" class="col-sm-2 col-form-label">PCS.Received</label>
                    <div class="col-sm-4">
                        <input type="number" name="p_receive" maxlength="15" class="form-control newReceive"
                            id="PCS.Rescived" required placeholder="PCS.Received">
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="TotalStock" class="col-sm-2 col-form-label">In Stock</label>
                    <div class="col-sm-4 ">
                        <input type="number" readonly name="Instock" value="<?= $n ?>" maxlength="15"
                            class="form-control Instock" id="TotalStock" required placeholder="In Stock">
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="TotalStock" class="col-sm-2 col-form-label">New total</label>
                    <div class="col-sm-4">
                        <input type="number" name="stock" value="<?= $n ?>" readonly maxlength="15"
                            class="form-control newTotal" id="TotalStock" required placeholder="New total">
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="receivedDate" class="col-sm-2 col-form-label">Received date</label>
                    <div class="col-sm-4">
                        <input type="date" name="r_date" maxlength="15" class="form-control" id="receivedDate"
                            placeholder="Received date" required>
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="costPrice" class="col-sm-2 col-form-label">Cost price</label>
                    <div class="col-sm-4">
                        <input type="number" name="cost" maxlength="15" class="form-control" id="costPrice"
                            placeholder="Cost price" required>
                    </div>
                </div>
                <div class="mb-3 " style=" margin-left: 75% !important;">
                    <button type="submit" name='submit' class="btn btn-primary">Received</button>
                </div>
            </form>
        </div>

    </div>

    <script>
    $(document).ready(function() {
        $(".newReceive").on('blur', function() {
            let instok = $(".Instock").val();
            let newRecieve = $(this).val();
            let n = (parseInt(instok) + parseInt(newRecieve));
            if (n) {
                $(".newTotal").val(parseInt(n));
            }
        })
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?php
    include('includes/footer.php');