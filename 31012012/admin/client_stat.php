<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config.php');

$limit = 5;

$page = 0;
if (isset($_GET["page"])) {
    if ($_GET["page"] == 0) {
        $page = 1;
    } else
        $page  = $_GET["page"];
} else {
    $page = 1;
};

$record_index = ($page - 1) * $limit;
if (isset($_GET['email']) & !empty($_GET['email'])) {
    function statClient($record_index, $limit)
    {
        include './stock_actions/connect.php';
        $id = $_GET['email'];

        $qury = "SELECT invoice_order.date as date ,invoice_order_item.order_item_quantity as q ,stock_items.item_number as number ,invoice_order.order_id as o 
    FROM invoice_order,invoice_order_item ,stock_items 
     WHERE invoice_order_item.order_id=invoice_order.order_id 
     AND invoice_order_item.item_code=stock_items.item_number 
     AND invoice_order.order_receiver_address='$id' LIMIT $record_index, $limit";
        $result = $pdo->prepare($qury);
        if ($result->execute()) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else
            return 0;
    }
?>
<style>
.statistics-input_haeder {
    background-color: rgb(240, 240, 240);

    /* padding: 0 -20px; */
}

.undrer_line {
    width: 100% !important;
    height: 10px !important;
    border-bottom: 5px solid #7CA7C2;
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 0;
}

.pagination li {
    padding: 0 10px;
}

.none {
    display: none;
}

.ff {
    display: contents;
}
</style>
<div class="content-wrapper">
    <div class="container overflow-hidden">

        <h3 class="text-center">Stat</h3>
        <hr>
        <div class="container" style="background-color:rgb(255,255,255);  ">
            <div class="container">
                <h5>Entreprise : <?= $_GET['entr'] ?></h5>
                <div class="container ">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th><input type="text" readonly value="Date"
                                        class="text-center statistics-input_haeder">
                                </th>
                                <th><input type="text" readonly value="Item number"
                                        class="text-center statistics-input_haeder"></th>
                                <th> <input type="text" readonly value="Pcs"
                                        class="text-center statistics-input_haeder">
                                </th>
                                <th><input type="text" readonly value="Invoice numer."
                                        class="text-center statistics-input_haeder"></th>
                            </tr>
                            <?php foreach (statClient($record_index, $limit) as $row) { ?>
                            <tr>
                                <th><input type="text" readonly value="<?= $row['date'] ?>" class="text-center ">
                                </th>
                                <th><input type="text" readonly value="<?= $row['number'] ?>" class="text-center ">
                                </th>
                                <th> <input type="text" readonly value="<?= $row['q'] ?>" class="text-center ">
                                </th>
                                <th><input type="text" readonly value="<?= $row['o'] ?>" class="text-center "></th>
                            </tr>
                            <?php  } ?>
                        </table>
                    </div>
                    <div>
                        <?php
                            include './stock_actions/connect.php';
                            $id = $_GET['email'];

                            $qury = "SELECT *
                              FROM invoice_order,invoice_order_item ,stock_items 
                                   WHERE invoice_order_item.order_id=invoice_order.order_id 
                                      AND invoice_order_item.item_code=stock_items.item_number 
                                      AND invoice_order.order_receiver_address='$id'";
                            $retval1 = $pdo->prepare($qury);
                            $retval1->execute();
                            // $retval1 = $retval1->fetchAll(PDO::FETCH_ASSOC);

                            $total_records = $retval1->rowCount(); //$row['v'];
                            $total_pages = ceil($total_records / $limit);

                            $next = true;
                            if (!isset($_GET['page']) || $_GET['page'] == $total_pages - 1) {
                                $next = false;
                            }
                            $prev = false;
                            if (!isset($_GET['page']) || $_GET['page'] == 0) {
                                $prev = true;
                            } ?>
                        <div style="display: <?= $total_pages == 1 ||  $total_records == 0? "none" : "block" ?>" ;>
                            <ul class="pagination">
                                <li class="<?= $prev ? "none" : "ff" ?>"><a
                                        href="client_stat.php?email=<?= $_GET['email'] ?>&entr=<?= $_GET['entr'] ?>&page=<?= ($page - 1) ?>"
                                        class="badge rounded-pill text-bg-info">Previous </a></li>
                                <li><br></li>
                                <li class="<?= $next && $_GET['page'] != 0 ? "none" : "ff" ?>"><a
                                        href="client_stat.php?email=<?= $_GET['email'] ?>&entr=<?= $_GET['entr'] ?>&page=<?= ($page + 1) ?>"
                                        class="badge rounded-pill text-bg-info">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="client_stat_print.php?email=<?= $_GET['email'] ?>&entr=<?= $_GET['entr'] ?>"
                        style="float: right; margin-top:-5px;display: <?= $total_records == 0 ? "none" : "block" ?>" class="btn btn-sm btn-warning mx-2" id="imerimer">
                        <i class="fas fa-print"></i> Imprimer</a>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
}
include('includes/footer.php'); ?>