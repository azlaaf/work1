<?php
session_start();



$email=$_SESSION['email'];
include('config.php');
$id = $_GET['q'];
$sql = "select Entreprise from client where Entreprise like '%".$id."%' and main_user='$email' limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
 echo $row["Entreprise"]. "\n";
 }
} else {
 echo "0 results";
}
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/ui/1.8.24/jquery-ui.js" integrity="sha256-xWbKoNW9eZkm1RodPMQHsVyql6jqeiD6IYvsGyKEW78=" crossorigin="anonymous"></script>