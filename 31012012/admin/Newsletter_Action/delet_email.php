<?php
include('../stock_actions/connect.php');
if (isset($_GET['id'])) {
    if (!empty($_GET['id'])) {
        $resutl = $pdo->prepare("DELETE FROM newsletter WHERE Id=?");
        $resutl->execute(array($_GET['id']));
        header('Location: ../MailList.php');
    }
}