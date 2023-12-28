<?php 

$conn = mysqli_connect("2wahka.com.mysql", "2wahka_com2wahka" , "admin_2wahka" , "2wahka_com2wahka");

$req = "SELECT * from article " ;
$req1 = "SELECT * from customer";
$rs = mysqli_query($conn , $req) or die(mysql_error()) ;
$rs2 = mysqli_query($conn , $req1) or die(mysql_error()) ;
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>votre facture</title>
	<link rel="stylesheet" href="print.css" type="text/css" media="print" />
</head>
<body>
	<h3 align="center"><strong>Facture</strong> </h3>
	<table align="right" border="2px">
			<tr>
				<td style="border-style : none;border-left-style : none;">Nom de la société</td>
				<td style="border-style : none;border-left-style : none;"><input type="text" name="Nsoc" required style="border: none;"></td>
			</tr>
			<tr>
				<td style="border-style : none;border-left-style : none;">Adresse</td>
				<td style="border-style : none;border-left-style : none;"><input type="text" name="Asoc" required style="border: none;"></td>
			</tr>
			<tr>
				<td style="border-style : none;border-left-style : none;">Ville</td>
				<td style="border-style : none;border-left-style : none;"><input type="text" name="Vsoc" required style="border: none;"></td>
			</tr>
			<tr>
				<td style="border-style : none;border-left-style : none;">Code postal</td>
				<td style="border-style : none;border-left-style : none;"><input type="text" name="Csoc" required style="border: none;"></td>
			</tr>
			<tr>
				<td style="border-style : none;border-left-style : none;">Paient No</td>
				<td style="border-style : none;border-left-style : none;"><input type="text" name="Psoc" required style="border: none;"></td>
			</tr>




			

		</table>
		<p>
		
		<table align="left" border="2px" id="table1" >

			<tr>
				<td style="border-style : none;border-left-style : none;">Nom</td>
				<?php 
			$total=0;
			while($data1 = mysqli_fetch_array($rs2))
			{
			?>
				<td style="border-style : none;border-left-style : none;" align="center"><?php echo $data1["nom"];?></td>
			</tr>
			<tr>
				<td style="border-style : none;border-left-style : none;">Adresse</td>
				<td style="border-style : none;border-left-style : none;"><?php echo $data1["adresse"];?></td>
			</tr>
			<tr>
				<td style="border-style : none;border-left-style : none;" >Ville</td>
				<td style="border-style : none;border-left-style : none;" align="center"><?php echo $data1["ville"];?></td>
			</tr>
			<tr>
				<td style="border-style : none;border-left-style : none;">Code postal</td>
				<td style="border-style : none;border-left-style : none;" align="center"><?php echo $data1["Code_Postal"];?></td>
			</tr>

			<?php 
			}
			?>




		</table>
		</p>


		
			<br><br><br><br><br><br><br><br><br><br>
			<div>
			<p>
			
<table align="center" border="2px" >

			<tr>
				<td style="width:80px">Article</td>
				<td style="width:60%">Texte</td>
				<td style="width:80px">Quantité</td>
				<td style="width:80px">prix</td>
				<td style="width:110px">Montant (DH)</td>
			</tr>
			<?php 
			$total=0;
			while($data = mysqli_fetch_array($rs))
			{
			?>
			<tr>
				<td style="width:80px"><?php echo $data["article"];?></td>
				<td style="width:60%"><?php echo $data["texte"]   ?></td>
				<td style="width:80px"><?php echo $data["quantite"] ?></td>
				<td style="width:80px"><?php  echo $data["prix"]  ?></td>
				<td style="width:90px"><?php  echo $data["quantite"]*$data["prix"] ?></td>
			</tr>
				<?php  $tv = $data["tva"] ; ?>
				<?php  
					$total = ($data["quantite"]*$data["prix"])  + $total ;

				 ?>
			<?php 
			}
			?>
		</table>
			<table align="left" border="1px" style="margin-left: 210px;">
			<tr>
				<td  style="width:480px">Sous-total hors TVA</td>
				<td  style="width:80px"><?php   echo $total  ?></td>
				<td style="width:20px">DH</td>
				
				
			</tr>
			<tr>
				<td  style="width:480px">Sous-total TVA incluse</td>
				<td style="width:80px"  ><?php   echo $total+($total*($tv/100) ) ?></td>
				<td style="width:20px">DH</td>
				
			</tr>
			<tr>
				<td  style="width:480px">la tva constitue : </td>
				<td  style="width:80px"><?php  echo $tv  ?></td>
				<td style="width:20px">%</td>

				
			</tr>
			<tr>
				
			</tr>

			

		</table> </p>
<div>
<table align="left"  style="margin-left:270px;">
	<th>
		<td>
<input  id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer votre facture"    />
</td></th>
</table></div>


</body>
		<script type="text/javascript">
function imprimer_page(){
  window.print();
	
	<?php 
	$conn = mysqli_connect("2wahka.com.mysql", "2wahka_com2wahka" , "admin_2wahka" , "2wahka_com2wahka");

  $sql = 'DELETE FROM article';
  $sql2 = 'DELETE FROM customer';
  	mysqli_query($conn , $sql) ;
  	mysqli_query($conn , $sql2);
  	?>

}
</script>
</html>




<?php


?>
