
<?php

include('config.php');
$id=$_GET['id'];
$sql = "SELECT * FROM employee where idEmployee='$id'";
$salary = mysqli_query($conn, 'SELECT * FROM bulletin_de_salaire');
$vacance = mysqli_query($conn, "SELECT * FROM `comptes de vacances`");
$result = mysqli_query($conn, $sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
$numE=$row["Numero_employe" ];
$Peride=$row['Periode'] ; 
$numA=$row['N_account'];
$date=$row['Date_de_disposition'];

$Cnss=$row['N_cnss'];
$cimr=$row['N_cimr'];
$job=$row['Job'];
$nom=$row['Name'];
$adresse=$row['Adresse']; 
$ville=$row['Ville'];
$CP=$row['Code_Postal'];
}
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <form action="" ></form>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
        <td colspan="2" align="center" style="font-size:18px"><b>Salary</b></td>
        </tr>
        <tr>
        <td colspan="2">
        <table width="100%" cellpadding="3" border="1">
        <tr>
        <td width="65%" >
        From,<br />
        <p>Adress</p><br>
        <p>Ville</p>
        <p>code Postal</p>
        <p>Titre de travail:
        <?php 
            echo $job
            ?></p>
        <p>Nom:<?php 
            echo $nom
            ?></p>
        <p>Adresse:: <?php 
            echo $adresse
            ?></p>
        <p>ville: <?php 
            echo $ville
            ?></p>
        <p>code Postal:: <?php 
            echo $CP
            ?></p>
        
        </td>
        <td width="35%">         
            <p>Numero d'employe:<?php echo $numE ?></p>
            <p>periode: <?php 
            echo $Peride
            ?></p>
            <p>N de compte : <?php 
            echo $numA
            ?></p>
            <p>Date de disposition: <?php 
            echo $date
            ?></p>
            <p>N de cnss: <?php 
            echo $Cnss
            ?></p>
            <p>N de CIMR: <?php 
            echo $cimr
            ?></p>
        </td>
        </tr>
        </table>
        <br />
        <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
        <th align="left">No</th>
        <th align="left">Text</th>
        <th align="left">Base</th>
        <th align="left">Tarif</th>
        <th align="left">Paye</th>
        <th align="left">Soustraite</th> 
        </tr>
        <?php
    while ($fetch = mysqli_fetch_assoc($salary))
    {
        echo "<tr>";
        echo "<td>" . $fetch['Number'] . "</td>";
        echo "<td>" . $fetch['Texte'] . "</td>";
        echo "<td>" . $fetch['Active'] . "</td>";
        echo "<td>" . $fetch['base'] . "</td>";
        echo "<td>" . $fetch['sousraite'] . "</td>";
        echo "<td>" . $fetch['tarif'] . "</td>";
        echo "</tr>";
    }
  
    ?>
        </table>
        <table width="100%" border="1" cellpadding="5" cellspacing="0">
            <tr>
            <th align="left">Compte de vacances</th>
            <th align="left">Peride de temps</th>
            <th align="left">Anne a ce jour</th>
            <th align="left">Tcomptes de vacances</th>
            <th align="left">solde</th>
            </tr>
            <?php
    while ($fetch = mysqli_fetch_assoc($vacance))
    {
        echo "<tr>";
        echo "<td>" . $fetch['Comptes_de_vacances '] . "</td>";
        echo "<td>" . $fetch['Periode_de_temps'] . "</td>";
        echo "<td>" . $fetch['Annee_à_ce_jour'] . "</td>";
        echo "<td>" . $fetch['Saldo'] . "</td>";
      
    }
  
    ?>
            <tr></tr>
            </table>
            <table width="100%" border="1" cellpadding="5" cellspacing="0">
            <tr>
            <th align="left">Saldo</th>
            <th align="left">Peride de temps</th>
            <th align="left">Saldo</th>
            <th align="left">periode de temps</th>
            <th align="left">Anne a ce jour</th>
            </tr>
            <?php
    while ($fetch = mysqli_fetch_assoc($vacance))
    {
        echo "<tr>";
        echo "<td>" . $fetch['Comptes_de_vacances '] . "</td>";
        echo "<td>" . $fetch['Periode_de_temps'] . "</td>";
        echo "<td>" . $fetch['Annee_à_ce_jour'] . "</td>";
        echo "<td>" . $fetch['Saldo'] . "</td>";
        echo "<td>" . $fetch['Saldo'] . "</td>";
      
    }
  
    ?>
            <tr></tr>
            </table>
        
              

</div> 
</body>
</html>
<div class="col-md-12 text-center">
<button onclick="window.print()" type="button" class="btn btn-primary ">Print</button>
</div>