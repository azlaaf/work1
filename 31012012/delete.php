<?php 
session_start();
include('admin/config.php');
$id=$_GET['id'];
$sql="DELETE FROM badpayer WHERE idClient='$id'";
$res=$conn->query($sql);
if($res){
    ?>
    <script>
    alert("bad payer deleted successfully");
    window.location.href="delete_bad_payer.php";
    </script>
    <?php
}
?>