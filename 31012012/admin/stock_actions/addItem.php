<?php
include 'connect.php';
include 'add-item-class.php';
include 'receive_action.php';
$error = false;
$msg = false;
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
        if ($item->numberExist($pdo)) {
            $error = "Item number already exists !!!";
        } else {
            if ($item->addItems($pdo)) {
                $msg = "Item receive successfully";
                $date = date("Y-m-d");
                $v = $pdo->query("SELECT max(id_item) as id  FROM stock_items");
                $new = new receive($stock, $stock, $date, $costP);
                $id = $v->fetch(PDO::FETCH_ASSOC)['id'];
                $new->addReceive($pdo, $id);
            } else {
                $error = "Error of connection try again";
            }
        }
    }
    
} else {
    // header('Location: add-item.php');
}