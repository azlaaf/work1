<?php 
session_start();
include('config.php');
$id=$_GET['id'];
$sql="DELETE FROM employee WHERE idEmployee='$id'";
$res=$conn->query($sql);
if($res){
    ?>
    <script>
    alert("Employee deleted successfully");
    window.location.href="list-employee.php";
    </script>
    <?php
}
?>