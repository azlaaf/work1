<?php
session_start();
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include ('config.php');
$email=$_SESSION['email'];


$query = "SELECT * FROM user where email='$email'";
$result = $conn->query($query);
while($rows = $result->fetch_assoc()){
    $entreprise=$row['Entreprise'];
    $Adresse=$row['Adresse'];
    $Ville=$row['Ville'];
    $Code_Postal=$row['Code_postal'];

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
		$Vacation=$row['Vacation'];
		$acc_salaryslip=$row['acc_salaryslip'];
		$Date_de_dispo=$row['Date_de_disposition'];
		$N_account=$row['N_account'];
		$N_cnss=$row['N_cnss'];
		$N_cimr=$row['N_cimr'];
		$N_cnss=$row['N_cnss'];
		$bank=$row['bank'];
		$Salary=$row['Numero_de_reglement'];
	}}
	else{
		$N_employee='';
		$idEmployee='';
		$Name='';
		$job='';
		$adresse='';
		$Code_postal='';
		$Cin='';
		$Periode='';
		$Vacation='';
		$acc_salaryslip='';
		$Date_de_dispo='';
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
	function Acc($acc_salaryslip) {
		$acc_salaryslip = 0;
		foreach(func_get_args() as $value ) {
			$acc_salaryslip += $value;
		}
	}
	Acc (100,100,75,100,100,100,100,100,100,100,100,100);
    // function add($)

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>salary</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="salary.css">

<script type="text/javascript">
        $(document).ready(function() {
            $('#N_employe').keyup(function() {
                var sid = $(this).val();
                var data_String = 'sid=' + sid;
                $.get('salary_auto.php', data_String, function(result) {
                    $.each(result, function(){
                        $('#titre_travail').val(this.Job);
                         $('#nom_1').val(this.Name);
                         $('#adresse_1').val(this.Adresse);
                         $('#CodePostal_1').val(this.Code_Postal);
                         $('#cin').val(this.Cin);
                         $('#N_employe').val(this.Numero_employe);
                         $('#periode').val(this.Periode);
                         $('#bank').val(this.bank);
                         $('#date_disposition').val(this.Date_de_disposition);
                         $('#N_cnss').val(this.N_cnss);
                         $('#N_compte').val(this.N_account);
                         $('#N_cimr').val(this.N_cimr);
						 $('#vacation').val(this.Vacation);
                    });
                });
            });
        });
    </script>

</head>
<body id="body">
     <section class="content" style="margin-left: 220px;">
      <div class="container-fluid">

          <!--- ***********      ***********--->

                                          <div class="breadcrumb-item" >
    <!-- <a href="https://2wahka.com/31012012/admin/index.php" style="float:right;">Home</a>-->

          </div>

          <!---*******     ****************---->
        <!-- Small boxes (Stat box) -->



        <div class="container mx-auto">


                    <h3 style="    margin-right: 100px;" align="center"><strong>Salary Slip</strong> </h3>
	<table  style="margin-left: -50px;" align="left" border="0px" id="table1"  >

		<tr>
				<td style=" border-right: none;border-left-style : none; margin:=0px;"><input type="text" name="nom_societe" id="nom_societe" required style="border: none; position :relative; top:7px; width:200%; " value="<?php echo $entreprise ?>"> </td>
			</tr>
			<tr>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="Adresse" required style="border: none; position :relative; bottom:px; " value="<?php echo $Adresse ?>"></td>
			</tr>

			<tr>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="CodePostal" required style="border: none; position :relative; bottom:7px;  " value="<?php echo $Code_Postal ?>"></td>
			</tr>
	<tr>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="ville" required style="border: none; position :relative; bottom:15px;" value="<?php echo $Ville ?>"></td>
			</tr>

		</table>

		<div>

		<table  style="margin-left: 655px; " align="left" border="0px" id="table1" >
	<tr>
				<td style=" border-right: none; border-left-style : none;  position :relative; top:13px;"> Work Title</td>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="titre_travail" value="<?php echo $job ?>" id="titre_travail" required style="border: none; margin-left:50px; position :relative; top:13px;"></td>
			</tr>
			<tr>
				<td style=" border-right: none; border-left-style : none;  position :relative; top:5px;">Name</td>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="nom_1" id="nom_1"  value="<?php echo $Name ?>"required style="border: none; margin-left:50px; position :relative; top:5px;"></td>
			</tr>
			<tr>
				<td style=" border-right: none; border-left-style : none; position :relative; bottom:px;" >Adresse</td>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="adresse_1"  value="<?php echo $adresse ?>" id="adresse_1" required style="border: none; margin-left:50px;  position :relative; bottom:px;"></td>
			</tr>
			<tr>
				<td style=" border-right: none; border-left-style : none;position :relative; bottom:7px;">Zip</td>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="CodePostal_1"  value="<?php echo $Code_postal ?>"id="CodePostal_1" required style="border: none; margin-left:50px; position :relative; bottom:7px;"></td>
			</tr>
			<tr>
				<td style=" border-right: none; border-left-style : none;position :relative; bottom:12px;">Cin</td>
				<td style=" border-right: none;border-left-style : none;"><input type="text" name="cin" id="cin"  value="<?php echo $Cin ?>" required style="border: none; margin-left: 50px; ;position :relative; bottom:12px;"></td>
			</tr>
		</table></div>
	</br></br></br></br></br>
<p></p>

		<table  align="right" border="0px" style="    margin-left: 500px; margin-top: 30px;"  >
			<tr>
				<td style="width: 30%;  position:relative; left:160px;">Employee number</td>
				<td><input type="text" name="N_employe" id="N_employe" value="<?php echo $N_employee ?>" required style="border: none; position:relative; left:160px;" size="40x"></td>
			</tr>
			<tr>
				<td style=" position:relative; left:160px;">Hours</td>
				<td ><input type="text" name="periode" id="periode" value="<?php echo $Periode ?>" required style="border: none;  position:relative; left:160px;"  size="40x"></td>
			</tr>
			<tr>
				<td style=" position:relative; left:160px;">Hours</td>
				<td ><input type="text" name="vacation" id="vacation" value="<?php echo $Vacation ?>" required style="border: none;  position:relative; left:160px;"  size="40x"></td>
			</tr>
						<tr>
				<td style=" position:relative; left:160px;">Bank</td>
				<td ><input type="text" name="bank" id="bank" value="<?php echo $bank ?>" required style="border: none;  position:relative; left:160px;"  size="40x"></td>
			</tr>
			<tr>
				<td style=" position:relative; left:160px;">Account Number</td>
				<td ><input type="text" name="N_compte" id="N_compte" value="<?php echo $N_account ?>" required style="border: none;  position:relative; left:160px;"  size="40x"></td>
			</tr>
			<tr>
				<td style=" position:relative; left:160px;">Disposition date</td>
				<td ><input type="text" name="date_disposition" id="date_disposition" value="<?php echo $Date_de_dispo ?>" required style="border: none;  position:relative; left:160px;"  size="40x"></td>
			</tr>
			<tr>
				<td style=" position:relative; left:160px;">CNSS Number</td>
				<td ><input type="text" name="N_cnss" id="N_cnss" value="<?php echo $N_cnss ?>" required style="border: none;  position:relative; left:160px;"  size="40x"></td>
			</tr>
			<tr>
				<td style=" position:relative; left:160px;">CIMR Number</td>
				<td ><input type="text" name="N_cimr" id="N_cimr" value="<?php echo $N_cimr ?>" required style="border: none;  position:relative; left:160px;"  size="40x"></td>
			</tr>
		</table>
			<table style="    margin-left: -51px;" align="left" border="2px" id="tab3">

			<tr>
				<td width="3px">NO</td>
				<td style="width: 40%;">Text</td>
				<td width="8px">Basis</td>
				<td width="8px">Rate</td>
				<td width="16px">Paid</td>
				<td width="12px">Deduction</td>
			</tr>
			<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px" style="padding: 10px;"></td>
				<td><input type="text" name="descr" required style="border: none;" size="39px"  style="padding: 10px;"   value="Last period base salary" ></td>
				<td><input type="text" name="quantite" required style="border: none;" width="100%"value="<?php echo$Periode ?>"   style="padding: 10px;"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%" value="<?php echo$Salary ?>"  style="padding: 10px;"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="20px"style="padding: 10px;" value="<?php echo paye($Periode,$Salary)  ?>"  ></td>
				<td ><input type="text" style="border: none;" size="10px"  style="padding: 10px;"></td>

			</tr>
			<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td><input type="text" name="descr" required style="border: none;" size="39px"  style="padding: 10px;"   value="Inset Vacation Money" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"  value="<?php echo$Vacation ?>"  style="padding: 10px;"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"   ></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
			<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none; font-weight: bold;" size="39px"  value="Total Gross Salary"></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px" value="<?php echo paye($Periode,$Salary)  ?>"  > </td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
			<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
			<tr>

				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"   value="CNSS Company Part" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"   value="<?php echo paye($Periode,$Salary) ?>" ></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"   ></td>
				<td ><input type="text" style="border: none;" size="12px"  value="<?php echo CNSS($Periode,$Salary) ?>" ></td>

			</tr>
			<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="Contribution to the unemployement fund" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>
			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="AMO Employee Part" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"   value="CIMR Employee Part"  ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="DIM Employee Part" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none; font-weight: bold;" size="39px"  value="Employee Deduction" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"   ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="TAX" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="A Conto payement" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="Canteen arrangement" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
				<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="Roundingt" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
							<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  value="Salary for number of working days" ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
							<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
							<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none; font-weight: bold;" size="39px"  value="Total MAD to be paid out " ></td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
			<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
			<tr>
				<td ><input type="text" name="article" required style="border: none;" size="3px"></td>
				<td ><input type="text" name="descr" required style="border: none;" size="39px"  td>
				<td ><input type="text" name="quantite" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="prix" required style="border: none;" width="100%"></td>
				<td ><input type="text" name="montant" required style="border: none;" size="16px"></td>
				<td ><input type="text" style="border: none;" size="12px"></td>

			</tr>
		</table>
			</br></br></br></br></br>
<p></p>
		<table style="margin-left: -51px; margin-top: 30px;" align="left" border="2px">
			<tr>
				<th style="width: 350px;">Vacation</th>
				<th style="width: 350px;">Hours this period</th>
				<th style="width: 350px;">Year to date</th>
				<th style="width: 350px;">Vacation</th>
				<th style="width: 350px;" align="right">Balance</th>

			</tr>
			<tr>
				<td style="width: 350px;">Vacation held</td>
				<td style="width: 350px;"><input type="text" name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text" name="" style="width: 100%;"></td>
				<td style="width: 350px;">Holiday that can be held "2023"</td>
				<td style="width: 350px;" align="right"><input type="text" name="" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;" align="right"><input type="text"  name="" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 350px;">Earned vacation last year</td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;" align="right"><input type="text"  name="" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 350px;">Earned suppl. de Vac.</td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;" align="right"><input type="text"  name="" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 350px;"><input type="text" name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 350px;" align="right"></td>
			</tr>
		</table>
		<table style="margin-left: -51px; margin-top: 30px;" align="left" border="2px">
			<tr>
				<th style="width: 300px;">Balance</th>
				<th style="width: 300px;">Hours this period</th>
				<th style="width: 300px;">Year to date</th>
				<th style="width: 300px;">Balance</th>
				<th style="width: 300px;">Hours this period</th>
				<th style="width: 300px;">Year to date</th>
			</tr>
			<tr>
				<td style="width: 300px;"><input type="text" name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 300px;">Gross Income</td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 300px;">Hours</td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 300px;"><input type="text" name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
				<td style="width: 300px;"><input type="text"  name="" style="width: 100%;"></td>
			</tr>
		</table>
<div>

<table align="right"  style="margin-left:270px; margin-top: 20px;margin-bottom:20px;">
	<th>
		<td>
<style>
.lien:link, .lien:visited {
  background-color: white;
  color: green;
  border: 2px solid green;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.lien:hover, .lien:active {
  background-color: green;
  color: white;
}
</style>
<a  class="lien" target="_blank" href="print_salary.php?idEmployee=<?php echo $idEmployee?>" > print</a>
</td></th>
</table></div>
</div>
</div>
</div>

<script type="text/javascript" src="popper.min.js"></script>
<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
		<script type="text/javascript">
function imprimer_page(){

 window.print();

}
</script>
</html>
<?php
include ('includes/footer.php');
?>