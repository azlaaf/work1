<?php
ob_start();
session_start();
$email = $_SESSION['email'];
include ('config.php');
$query = "SELECT * FROM user where email='$email'";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
	$entreprise = $row['Entreprise'];
	$Adresse = $row['Adresse'];
	$Ville = $row['Ville'];
	$Code_Postal = $row['Code_postal'];
}
if(isset($_GET['idEmployee'])){
	$idEmployee=$_GET['idEmployee'];
		$sql="SELECT * from employee WHERE idEmployee='$idEmployee'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
		$N_employee=$row['Numero_employe'];
		$idEmployee=$row['idEmployee'];
		$Name=$row['Name'];
		$job=$row['Job'];
		$adresse=$row['Adresse'];
		$Code_postal=$row['Code_Postal'];
		$Cin=$row['Cin'];
		$Periode=$row['Periode'];
		$Date_de_dispo=$row['Date_de_disposition'];
		$N_account=$row['N_account'];
		$N_cnss=$row['N_cnss'];
		$N_cimr=$row['N_cimr'];
		$N_cnss=$row['N_cnss'];
		$bank=$row['bank'];
		$Salary=$row['Numero_de_reglement'];
}}
if($idEmployee==''){
	$N_employee='';
	$idEmployee='';
	$Name='';
	$job='';
	$Adresse='';
	$Ville='';
	$Code_postal='';
	$Cin='';
	$Periode='';
	
	$N_account='';
	$N_cnss='';
	$N_cimr='';
	$N_cnss='';
	$bank='';
	$Salary='';
}
	
function paye($Periode,$Salary){
	if($Periode=='' or $Salary==''){
		return null;
	}else{
		$payer=$Periode*$Salary;
  
  return $payer;
	}
   
}
function CNSS($Periode,$Salary){
	if($Salary>=0 && $Salary<=9999.99 ){
		 $level1=(paye($Periode,$Salary)*(6.74/100));
		return intval($level1)+1;
	}
if($Salary>=10000 && $Salary<= 19999.99){
	$nv2_1=(10000*(2.26/100));
	$nv2_2=(6000*(3.96/100));
	$nv2_3=(6000*(0.52/100));
	$Total_nv2=$nv2_1+$nv2_2+$nv2_3;
   return intval($Total_nv2)+1;
}
if($Salary>=20000){
$nv2_1=(20000*(2.26/100));
$nv2_2=(6000*(3.96/100));
$nv2_3=(6000*(0.52/100));
$Total_nv2=$nv2_1+$nv2_2+$nv2_3;
return intval($Total_nv2)+1;
}
}
$html='';
$html.='
<body id="body">
	<section class="content" style="margin-left: 220px;">
		<div >
			<!-- Small boxes (Stat box) -->
			<div >
				<h3 style="    margin-right: 100px; position: relative; left:-40px;" align="center"><strong>Calcule des Salaires</strong> </h3>
				<table style="margin-left: -100px;" align="left" border="2px" id="table1">
					<tr>
						<td style=" border: none; border : none;">Nom de la société : </td>
						<td style=" border: none;"><input type="text" name="Adresse" required style="border: none;" value ='. $entreprise.'></td>
					</tr>
					<tr>
						<td style=" border: none; ">Adresse : </td>
						<td style=" border: none;"><input type="text" name="Adresse" required style="border: none;" value="'.$Adresse.'"></td>
					</tr>
					<tr>
						<td style=" border: none; ">Ville : </td>
						<td style=" border: none;"><input type="text" name="ville" required style="border: none;" value="'.$Ville.'"></td>
					</tr>
					<tr>
						<td style=" border: none; ">Code postal : </td>
						<td style=" border: none;"><input type="text" name="CodePostal" required style="border: none;" value="'.$Code_Postal.'"></td>
					</tr>
				</table>
				<div>
					<table style="margin-left: 500px; " border="2px" id="table1">
						<tr>
							<td style=" border: none; ">Titre de travail:</td>
							<td style=" border: none;"><input type="text" name="titre_travail" value ="'. $job.'" id="titre_travail" required style="border: none;" ></td>
						</tr>
						<tr>
							<td style=" border: none; ">Nom:</td>
							<td style=" border: none;"><input type="text" name="nom_1" id="nom_1" value="'.$Name.'" required style="border: none;"></td>
						</tr>
						<tr>
							<td style=" border: none; ">Adresse:</td>
							<td style=" border: none;"><input type="text" name="adresse_1" value="'.$Adresse.'" id="adresse_1" required style="border: none;"></td>
						</tr>
						<tr>
							<td style=" border: none; ">Code postal:</td>
							<td style=" border: none;"><input type="text" name="CodePostal_1" value="'.$Code_postal.'" id="CodePostal_1" required style="border: none;"></td>
						</tr>
						<tr>
							<td style=" border: none; ">Cin:</td>
							<td style=" border: none;"><input type="text" name="cin" id="cin" value="'.$Cin.'" required style="border: none;"></td>
						</tr>
					</table>
				</div>
				</br></br></br></br></br>
				<p></p>
				<table border="2px" style=" position: relative; bottom:-2px;   margin-left: 500px;">
					<tr>
						<td style=" border: none; ">Numéro demployé:</td>
						<td style=" border: none; "><input type="text" name="bank" id="bank" value="'.$N_employee.'" required style="border: none;" size="40x"></td>
					</tr>
					<tr>
						<td style=" border: none; ">Période:</td>
						<td style=" border: none; "><input type="text" name="bank" id="bank" value="'.$Periode.'" required style="border: none;" size="40x"></td>
					</tr>
					<tr>
						<td style=" border: none; ">Bank:</td>
						<td style=" border: none; "><input type="text" name="bank" id="bank" value="'.$bank.'" required style="border: none;" size="40x"></td>
					</tr>
					<tr>
						<td style=" border: none; ">N ° de compte:</td>
						<td style=" border: none; "><input type="text" name="N_compte" id="N_compte" value="'.$N_account.'" required style="border: none;" size="40x"></td>
					</tr>
					<tr>
						<td style=" border: none; ">Date de disposition:</td>
						<td style=" border: none; "><input type="text" name="date_disposition" id="date_disposition" value="" required style="border: none;" size="40x"></td>
					</tr>
					<tr>
						<td style=" border: none; ">N ° de CNSS:</td>
						<td style=" border: none; "><input type="text" name="N_cnss" id="N_cnss" value="'.$N_cnss.'" required style="border: none;" size="40x"></td>
					</tr>
					<tr>
						<td style=" border: none; ">N ° de CIMR:</td>
						<td style=" border: none; "><input type="text" name="N_cimr" id="N_cimr" value="'.$N_cimr.'" required style="border: none;" size="40x"></td>
					</tr>
				</table>
				<table style="position: relative; left:-100px;  top:50px" border="2px" id="tab3">
					<tr>
						<td style=" border: none;  ">NO</td>
						<td style=" border: none;  ">Texte</td>
						<td style=" border: none; ">Base</td>
						<td style=" border: none; ">Tarif</td>
						<td style=" border: none; ">Payé</td>
						<td style=" border: none; ">Soutraire</td>
					</tr>
					<tr>
						<td style=" border: none; "><input type="text" name="article" required style="border: none   ; height: 20px;  "></td>
						<td style=" border: none; "> <input type="text" name="descr" required style="border: none;   "value="Last period base salary"></td>
						<td style=" border: none; "><input type="text" name="quantite" required style="border: none; height: 20px;" value="'.$Periode.' "></td>
						<td style=" border: none; "><input type="text" name="prix" required style="border: none; height: 20px; "  value="'.$Salary.' "> </td>
						<td style=" border: none; "><input type="text" name="montant" required style="border: none; height: 20px; "value="'. paye($Periode,$Salary).'"></td>
						<td style=" border: none; "><input type="text" style="border: none;"></td>
					</tr>
					<tr>
						<td style=" border: none; "><input type="text" name="article" required style="border: none   ; height: 20px;  "></td>
						<td style=" border: none; "> <input type="text" name="descr" required style="border: none; "value="CNSS"> </td>
						<td style=" border: none; "><input type="text" name="quantite" required style="border: none; height: 20px; " value="'. paye($Periode,$Salary).'"></td>
						<td style=" border: none; "><input type="text" name="prix" required style="border: none; height: 20px; "> </td>
						<td style=" border: none; "><input type="text" name="montant" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" style="border: none;" value="'. CNSS($Periode,$Salary).'"></td>
					</tr>
					<tr>
						<td style=" border: none; "><input type="text" name="article" required style="border: none   ; height: 20px;  "></td>
						<td style=" border: none; "> <input type="text" name="descr" required style="border: none;   "></td>
						<td style=" border: none; "><input type="text" name="quantite" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" name="prix" required style="border: none; height: 20px; "> </td>
						<td style=" border: none; "><input type="text" name="montant" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" style="border: none;"></td>
					</tr>
					<tr>
						<td style=" border: none; "><input type="text" name="article" required style="border: none   ; height: 20px;  "></td>
						<td style=" border: none; "> <input type="text" name="descr" required style="border: none;   "></td>
						<td style=" border: none; "><input type="text" name="quantite" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" name="prix" required style="border: none; height: 20px; "> </td>
						<td style=" border: none; "><input type="text" name="montant" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" style="border: none;"></td>
					</tr>
					<tr>
						<td style=" border: none; "><input type="text" name="article" required style="border: none   ; height: 20px;  "></td>
						<td style=" border: none; "> <input type="text" name="descr" required style="border: none;   "></td>
						<td style=" border: none; "><input type="text" name="quantite" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" name="prix" required style="border: none; height: 20px; "> </td>
						<td style=" border: none; "><input type="text" name="montant" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" style="border: none;"></td>
					</tr>
					<tr>
						<td style=" border: none; "><input type="text" name="article" required style="border: none   ; height: 20px;  "></td>
						<td style=" border: none; "> <input type="text" name="descr" required style="border: none;   "></td>
						<td style=" border: none; "><input type="text" name="quantite" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" name="prix" required style="border: none; height: 20px; "> </td>
						<td style=" border: none; "><input type="text" name="montant" required style="border: none; height: 20px; "></td>
						<td style=" border: none; "><input type="text" style="border: none;"></td>
					</tr>
				</table>

				<table style="position: relative; left:-100px; width:106.5%; top:100px" border="2px" id="tab3">
                        <tr>
                        	<td style=" border: none; width: 201px; ">Vacation</td>
                        	<td style=" border: none; width: 201px; ">Hours this period</td>
                        	<td style=" border: none; width: 201px;">Year to date </td>
							<td style=" border: none; width: 201px;">Vacation </td>
							<td style=" border: none; width: 201px;">Balance </td>
                        </tr>
                        <tr>
                        	<td style=" border: none; ">Vacance à tenu</td>
                        	<td style=" border: none; "><input type="text" name="" required style="  height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style="height: 20px; "></td>
                        	<td style=" border: none; ">Vac.peuvent etre tenues 22 </td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        </tr>
						<tr>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style="height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        </tr>
						<tr>
                        	<td style=" border: none; ">Earned vacation last year</td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style="height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        </tr>
						<tr>
                        	<td style=" border: none; ">Earned suppl. de Vac.</td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style="height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        </tr>
						<tr>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style="height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" height: 20px; "></td>
                        	<td style=" border: none; "></td>
                        </tr>
			
		</table>
		<table style="position: relative; left:-100px; width:107%; top:150px" border="2px" id="tab3">
                        <tr>
                        	<td style=" border: none;  ">Balance</td>
                        	<td style=" border: none;  ">Hours this period</td>
                        	<td style=" border: none; ">Year to date </td>
							<td style=" border: none; ">Balance </td>
							<td style=" border: none; ">Hours this period</td>
							<td style=" border: none; ">Year to date</td>
                        </tr>
                        <tr>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        </tr>
						<tr>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        </tr>
						<tr>
                        	<td style=" border: none; ">le revenu</td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        </tr>
						<tr>
                        	<td style=" border: none; ">Hours</td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        </tr>
						<tr>
						    <td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        	<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
							<td style=" border: none; "><input type="text" name="" required style=" width: 190px; height: 20px; "></td>
                        </tr>
			
		</table>
				<div>';


				include('dompdf/autoload.inc.php');

use Dompdf\Dompdf;


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled',TRUE);
$dompdf->loadHtml(html_entity_decode($html));

// (Optional) Setup the paper size and orientation
$customPaper = array(0,0,1100,1100);
$dompdf->setPaper($customPaper);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print-salary.pdf',array('Attachment'=>false));