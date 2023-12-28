<?php
include 'stock_actions/connect.php';
session_start();
$id = $_GET['id'];
if (isset($id)) {

    $email = $_SESSION['email'];
    $result = $pdo->prepare("SELECT item_name,sale_price FROM stock_items WHERE item_number=? AND company_email=?");
    $result->execute(array($id, $email));

    if ($result->rowCount() > 0) {
        // header('Content-type: applecation/json');
        echo json_encode($result->fetch(PDO::FETCH_OBJ));
    } else {
        echo "-1";
    }
}