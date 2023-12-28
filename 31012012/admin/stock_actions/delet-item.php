<?php
include 'connect.php';
if (isset($_GET['id'])) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $resutl = $pdo->prepare("DELETE FROM stock_items WHERE id_item=?");
        $resutl->execute(array($id));
        header('Location: ../gestion-stock.php');
    }
}