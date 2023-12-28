<?php 
session_start();
include('config.php');
include("includes/header.php") ;
include('includes/topbar.php');
include('includes/sidebar.php');
include './stock_actions/addItem.php';
?>
 <div class="content-wrapper">
<div class="container mt-5">
                      <div class="breadcrumb-item" >
     <!--<a href="https://2wahka.com/31012012/admin/index.php" style="float:right;">Home</a>-->
   
          </div>
    <a href="./gestion-stock.php" class="go-back"><button type="button" class="btn btn-info mx-2">
            <i class="fa-sharp fa-solid fa-circle-left"></i>
            go back</button></a>
            
    <h3 class="text-center">Create new item</h3>
    <hr>
    <div class="<?= $error ? "alert alert-danger" : "none1" ?>">
        <?= $error ?></div>
    <div class="<?= $msg ? "alert alert-success" : "none1" ?>"> <?= $msg ?>
    </div>
    <form method="POST" class="row g-3">

        <div class="col-md-6">
                <label for="itemNumber" style="margin-bottom: -10px;"> Item number</label>
                <input type="number" name="itemNu" id="itemNumber" class="form-control my-2" placeholder="Item number"
                    autocomplete="off" aria-label="Item number" required>
                <label for="itemName" style="margin-bottom: -10px;"> Item Name</label>
                <input type="text" name="itemName" class="form-control my-2" id="itemName" placeholder="Item Name"
                    aria-label="Item Name" autocomplete="off" required>
                <label for="Sale_price" style="margin-bottom: -10px;">Sale price</label>
                <input type="number" name="saleP" step="0.01" class="form-control my-2" id="Sale_price"
                    placeholder="Sale price" autocomplete="off" aria-label="Sale price" required>
                <label for="Cost_price" style="margin-bottom: -10px;"> Cost price</label>
                <input type="number" name="costP" step="0.01" class="form-control my-2" id="Cost_price"
                    placeholder="Cost price" autocomplete="off" aria-label="Cost price" required>
                <label for="Unit" style="margin-bottom: -10px;"> Unit</label>
                <input type="text" name="unit" class="form-control my-2" placeholder="Unit" id="Unit" aria-label="Unit"
                    autocomplete="off" required>
                <label for="Quantity" style="margin-bottom: -10px;"> Quantity</label>
                <input type="number" name="stock" class="form-control my-2" autocomplete="off" id="Quantity"
                    aria-label="Quantity" placeholder="Quantity" autocomplete="off" required>

            </div>
            <div class="col-md-6">
                <label for="Description" style=" margin-bottom: -10px;">Description</label>
                <textarea class="form-control my-2" name="description" id="Description" placeholder="Description"
                    rows="4" maxlength="250" autocomplete="off" required></textarea>

            </div>
        <div>
            <input class="btn btn-primary" type="submit" name="submit" value="Create">
        </div>
    </form>
</div>
</div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</div>
<?php
include ('includes/footer.php');
?>