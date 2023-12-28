<?php 
session_start();
include('config.php');
include("includes/header.php") ;
include('includes/topbar.php');
include('includes/sidebar.php');
include('stock_actions/getItems.php');
?>
<div  class="content-wrapper">
    
  <div class="main">
        <div class="container">
            <div class="bg-light sticky-top">
                
                                <div class="breadcrumb-item" >
     <!--<a href="https://2wahka.com/31012012/admin/index.php" style="float:right;">Home</a>-->
   
          </div>
                
                <h2 class="text-center">Warehouse system control panel</h2>
                <div class="container">
                    <hr>
                    <div class="stock-buttons ">
                        <div class="stock-buttons-left">
                            <a href="./add-item.php"> <button type="button" class="btn btn-success mx-2">
                                    <i class="fa-sharp fa-solid fa-square-plus"></i>
                                    Create
                                    item</button></a>
                            <a href="#" id="edit-item"><button type="button" class="btn btn-warning mx-2"><i
                                        class="fa-sharp fa-solid fa-pen-to-square">
                                    </i> Edit Item</button></a>
                           <a href="#" id="receive"><button type="button" class="btn btn-primary mx-2"><i class="fa-solid fa-inbox-in"></i> Receive</button></a>
                        </div>
                        <input class="search-input" type="search" placeholder="Search" aria-label="Search"
                            id="live-search">
                        <div class="stock-buttons-right">
                            <a href="#" id="delet-item"><button type="button" class="btn btn-danger mx-2"><i
                                        class="fa-sharp fa-solid fa-trash"></i> Delete
                                    Item</button></a>
                        </div>
                    </div>
                </div>

                <hr>
                <table class="table table-bordered overflow-hidden">
                    <thead class="overflow-hidden">
                        <tr class="row text-center" >
                            <th class="col" style="width:15%;">
                            </th>
                            <th scope="col" class="col" >Item number</th>
                            <th scope="col" class="col">Item Name</th>
                            <th scope="col" class="col">Sales price</th>
                            <th scope="col" class="col">Cost Prisce</th>
                            <th scope="col" class="col" style="width:10%;">Stock</th>
                            <th scope="col" class="col">open</th>

                        </tr>
                    </thead>
                </table>
            </div>
            <table class="table overflow-hidden">
                <tbody class="items_searsh">
                    <?php while ($row = $result->fetch(PDO::FETCH_BOTH)) { ?>
                    <tr class="row text-center">
                        <th class="col"><input class="formcontrol Gcheck" type="checkbox" name="s_check"
                                value="<?= $row['id_item'] ?>">
                        </th>
                        <th class="col">
                            <?= $row['item_number'] ?>
                        </th>
                        <td class="col"  width="50px" style="text-align:left;"> <?= $row['item_name'] ?></td>
                        <td class="col"><?= $row['sale_price'] ?> MAD</td>
                        <td class="col"><?= $row['cost_price'] ?> MAD</td>
                        <td class="col" width="15%"><?= $row['stock'] ?></td>
                        <td class="col text-success"><i class="fa-sharp fa-solid fa-square-check"></i>
                        </td>
                    </tr>
                    <?php } ?>
                    <div class="<?= !$resultMesg ? "alert alert-secondary" : "none1" ?>">No matching records
                        found
                    </div>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<?php
include ('includes/footer.php');
?>