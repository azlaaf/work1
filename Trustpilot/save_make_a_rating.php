<?php
$conn=mysqli_connect("localhost", "root" , "","2wahka_com2wahka") or die(mysqli_error());


mysqli_select_db($conn,"2wahka_com2wahka")or die(mysqli_error());


$company = $_POST['company'];
$addresse = $_POST['addresse'];
$city = $_POST['city'];
$Phone_number = $_POST['Phone_number'];
$text_area = $_POST['text_area'];
$date = date("F j, Y");
$stars = $_POST['stars'];


$req="insert into rating(date,company,addresse,city,Phone_number,text_area,stars)
values ('" . mysqli_real_escape_string($conn,$date) . "','" . mysqli_real_escape_string($conn,$company) . "','" . mysqli_real_escape_string($conn,$addresse) . "','" . mysqli_real_escape_string($conn,$city) . "','" . mysqli_real_escape_string($conn,$Phone_number) . "','" . mysqli_real_escape_string($conn,$text_area) . "','" . mysqli_real_escape_string($conn,$stars) . "')";
mysqli_query($conn,$req) or die(mysqli_error());




 header('Location:index.php?reg_err=success');



?>