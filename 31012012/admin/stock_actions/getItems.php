<?php
include 'connect.php';
$resultMesg = true;
$result = $pdo->prepare("SELECT * FROM stock_items WHERE company_email=?");
$result->execute(array($_SESSION['email']));
if ($result->rowCount() == 0) {
    $resultMesg = false;
}