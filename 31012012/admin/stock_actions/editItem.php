<?php
include 'connect.php';
include 'add-item-class.php';
$error = false;
$msg = false;

$id = $_GET['id'];
function select($conn, $id)
{
    $qury = $conn->query("SELECT  * FROM stock_items WHERE id_item=$id ");
    return $qury;
}
$row = select($pdo, $id);
$row = $row->fetch(PDO::FETCH_BOTH);
if (isset($_POST['submit'])) {
    //grabbing the data
    $itemNu = htmlspecialchars($_POST['itemNu']);
    $itemNa = htmlspecialchars($_POST['itemName']);
    $saleP = htmlspecialchars($_POST['saleP']);
    $costP = htmlspecialchars($_POST['costP']);
    $unit = htmlspecialchars($_POST['unit']);
    $stock = htmlspecialchars($_POST['stock']);
    $description = htmlspecialchars($_POST['description']);
    //instantiate data
    $item = new addClass($itemNu, $itemNa, $saleP, $costP, $unit, $stock, $description);
    //ranning errors
    if ($item->Empty()) {
        $error = "Please enter all information";
    } else {

        if ($row['item_number'] != $itemNu) {
            if ($item->numberExist($pdo)) {
                $error = "Item number already exists !!!";
            } else {
                if ($item->update($pdo, $id)) {
                    $msg = "Item update successfully";
                } else {
                    $error = "Error of connection try again";
                }
            }
        } else {
            if ($item->update($pdo, $id)) {
                $msg = "Item update successfully";
            } else {
                $error = "Error of connection try again";
            }
        }
    }
}