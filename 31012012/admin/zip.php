<?php
header('Content-Type: application/json');
$response = array();
if (isset($_GET['sid']))
{
include('config.php');
	$qry = "SELECT * FROM city WHERE zip = '".$_GET['sid']."' limit 1";
	$result = mysqli_query($conn, $qry);  //mysql_query($qry);
	while ($row = mysqli_fetch_array($result)) {
		array_push($response, $row);
    }

	echo json_encode($response);
} 
?>
