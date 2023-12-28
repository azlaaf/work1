<?php 
session_start();
include('config.php');
$id=$_GET['id'];
$sql="DELETE FROM client WHERE idClient='$id'";
$res=$conn->query($sql);
if($res){
    ?>
    <script>
    alert("Client deleted successfully");
    window.location.href="list-client.php";
    </script>
    <?php
}
?>