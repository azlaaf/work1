<?php
session_start();
include('config.php');
include("includes/header.php");
include('includes/topbar.php');
include('includes/sidebar.php');
include('./stock_actions/statistics_item_action.php');
$rowss = Statistics();
?>
<style>
.statistics-input_haeder {
    background-color: rgb(240, 240, 240);
    padding: 0 -20px;
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
        <a href="./update-item.php?id=<?= $_GET['id'] ?>"> <button type="button" class="btn btn-info mx-2">
                <i class="fa-sharp fa-solid fa-circle-left"></i>
                go back</button></a>
        <h3 class="text-center">Statistics</h3>
        <hr>
        <div class="container" style="width:80%;  background-color:rgb(255,255,255);margin-left:10%;  ">
            <div class="container">
                <table class="table-responsive">
                    <tr>
                        <td>Item Number : <?= $_GET['number'] ?></td>
                        <td><input readonly type="text" style="visibility: hidden;"></td>
                    </tr>
                    <tr>
                        <td>Sold last 3 month</td>
                        <td></td>
                        <td><input readonly type="text" value="<?= soldLast3month() ?>"></td>
                    </tr>
                    <tr>
                        <td>Sold last 6 month</td>
                        <td></td>
                        <td><input readonly type="text" value="<?= soldLast6month() ?>"></td>
                    </tr>
                    <tr>
                        <td>Sold last 12 month</td>
                        <td></td>
                        <td><input readonly type="text" value="<?= soldLast12month() ?>"></td>
                    </tr>
                    <tr>
                        <td>Average purchase price </td>
                        <td></td>
                        <td><input readonly type="text"
                                value="<?= number_format((float)AveragePurchasePrice(), 2, '.', '')   ?> MAD"></td>
                    </tr>
                    <tr>
                        <td>Average sales price</td>
                        <td></td>
                        <td><input readonly type="text"
                                value="<?= number_format((float)AverageSalesPrice(), 2, '.', '')   ?>MAD"></td>
                    </tr>
                    <tr>
                        <td>expected sales next 12 months</td>
                        <td></td>
                        <td><input readonly type="text"></td>
                    </tr>
                </table>
            </div>
            <p class="undrer_line"></p>
            <div class="container">
                <table class="table-responsive">
                    <tr>
                        <th><input type="text" readonly value="Date" class="text-center statistics-input_haeder"></th>
                        <th><input type="text" readonly value="Pcs." class="text-center statistics-input_haeder"></th>
                        <th> <input type="text" readonly value="Type" class="text-center statistics-input_haeder"></th>
                        <th><input type="text" readonly value="Amount per pcs."
                                class="text-center statistics-input_haeder"></th>
                    </tr>
                    <!-- <tr> <?php $row = DateAdd()->fetch(PDO::FETCH_ASSOC) ?>
                        <td><input type="text" readonly value="<?= $row['value'] ?>" class="text-center"></td>
                        <td><input type="text" readonly value="<?= $row['stock'] ?>" class="text-center"></td>
                        <td><input type="text" readonly value="Buy" class="text-center"></td>
                        <td><input type="text" readonly value="<?= $row['cost_price'] ?> MAD" class="text-center"></td>

                    </tr> -->
                    <?php
                    $limit = 4;
                    $page = 0;
                    $record_index = ($page - 1) * $limit;
                    $total_records = count($rowss); //$row['v'];

                    $total_pages = ceil($total_records / $limit);

                    if (isset($_GET["page"])) {
                        if ($_GET["page"] == 0) {
                            $page = 1;
                        } else if ($_GET["page"] > $total_pages) {
                            $page = $total_pages;
                        } else
                            $page  = $_GET["page"];
                    } else {
                        $page = 1;
                    };

                    $record_index = ($page - 1) * $limit;
                    $total_records = count($rowss); //$row['v'];

                    $total_pages = ceil($total_records / $limit);

                    $next = false;
                    if (isset($_GET['page']) && $_GET['page'] == $total_pages - 1 && $_GET['page'] != 0) {
                        $next = true;
                    }
                    $prev = false;
                    if (!isset($_GET['page']) || $_GET['page'] == 0) {
                        $prev = true;
                    }
                    if (count($rowss) > 0) {
                        if (count($rowss) <= $limit) {
                            for ($i = 0; $i < count($rowss); $i++) {
                                echo '<tr>';
                                echo  '<td><input type="text" readonly value="' . $rowss[$i]['date'] . '" class="text-center"></td>';
                                echo  '<td><input type="text" readonly value="' . $rowss[$i]['q'] . '" class="text-center"></td>';
                                echo '<td><input type="text" readonly value="' . $rowss[$i]['type'] . '" class="text-center"></td>';
                                echo  '<td><input type="text" readonly value="' . $rowss[$i]['cost'] . ' MAD" class="text-center"></td>';

                                echo '</tr>';
                            }
                        } else {
                            for ($i = $record_index; $i < ($record_index + $limit); $i++) {
                                echo '<tr>';
                                echo  '<td><input type="text" readonly value="' . $rowss[$i]['date'] . '" class="text-center"></td>';
                                echo  '<td><input type="text" readonly value="' . $rowss[$i]['q'] . '" class="text-center"></td>';
                                echo '<td><input type="text" readonly value="' . $rowss[$i]['type'] . '" class="text-center"></td>';
                                echo  '<td><input type="text" readonly value="' . $rowss[$i]['cost'] . ' MAD" class="text-center"></td>';

                                echo '</tr>';
                                if ($i == count($rowss)-1)
                                    break;
                            }
                        }
                    }
                    ?>
                </table>
                <div style="display: <?= $total_pages == 1 ||  $total_records == 0 ? "none" : "block" ?>">
                    <ul class="pagination">
                        <li class="<?= $prev ? "none" : "ff" ?>"><a
                                href="statistics_item.php?id=<?= $_GET['id'] ?>&number=<?= $_GET['number'] ?>&page=<?= ($page - 1) ?>"
                                class="badge rounded-pill text-bg-info">Previous </a></li>
                        <li><br></li>
                        <li class="<?= $next ? "none" : "ff" ?>"><a
                                href="statistics_item.php?id=<?= $_GET['id'] ?>&number=<?= $_GET['number'] ?>&page=<?= ($page + 1) ?>"
                                class="badge rounded-pill text-bg-info">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="./stock_actions/print_statistics_item.php?id=<?= $_GET['id'] ?>&number=<?= $_GET['number'] ?>"
                style="float: right; margin-top:2px;display: <?= $total_records == 0 ? "none" : "block" ?>"
                class="btn btn-sm btn-warning mx-2" id="imerimer">
                <i class="fas fa-print"></i> Imprimer</a>
        </div>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<?php
include('includes/footer.php');
?>