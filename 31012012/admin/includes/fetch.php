<?php
include("../config.php");
$entreprise= $_POST['company'];
$sql = "select * from user where Entreprise ='$entreprise'";
$result = mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($result)){
    $data['Adresse'] =$rows['Adresse'];
    $data['ville'] =$rows['Ville'];
    $data['cp'] =$rows['Code_postal'];
}
echo json_encode($data);
?>