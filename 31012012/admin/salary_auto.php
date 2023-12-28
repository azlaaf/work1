<?php
header('Content-Type: application/json');
$response = array();
if (isset($_GET['sid']))
{
	include('config.php');
	$qry = "SELECT * FROM employee WHERE Numero_employe = '".$_GET['sid']."' ";
	$result = mysqli_query($conn, $qry);  //mysql_query($qry);
	while ($row = mysqli_fetch_array($result)) {
		array_push($response, $row);
    }

	echo json_encode($response);
} 
?>
