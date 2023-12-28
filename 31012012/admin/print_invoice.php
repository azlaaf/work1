<?php
ob_start();
session_start();
include 'invoice_class.php';
$invoice = new Invoice();
if(!empty($_GET['invoice_id']) && $_GET['invoice_id']) {
	echo $_GET['invoice_id'];
	$invoiceValues = $invoice->getInvoice($_GET['invoice_id']);		
	$invoiceItems = $invoice->getInvoiceItems($_GET['invoice_id']);	
	$userInfo=$invoice->getuser();
	$path=$_SESSION['logo'];
	
}


$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>'.$invoiceValues['type'].'</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	
	'.$invoiceValues['order_receiver_name'].'<br /> 
	'.$invoiceValues['order_receiver_address'].'<br />
	'.$invoiceValues['order_receiver_cp'].' '.$invoiceValues['order_receiver_ville'].' <br>
	</td>
	

	<td width="35%">
    <img src="https://2wahka.com/31012012/upload/'.$path.'" class="img-fluid" alt="Logo" width="90px"><br/>
    '.$userInfo['Entreprise'].'<br />
    '.$userInfo['Adresse'].'<br />
	'.$userInfo['Ville'].'
	'.$userInfo['Code_postal'].'<br/>
	 Numero de telephone: '.$userInfo['phone'].'<br>
	Patent No: '.$userInfo['patent_Number'].'<br>
	Bank:<br>
	Rib:
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">No</th>
	<th align="left">Article num</th>
	<th align="left">Text</th>
	<th align="left">Quantity</th>
	<th align="left">Price</th>
	<th align="left">Montant</th> 
	</tr>';
$count = 0;   
foreach($invoiceItems as $invoiceItem){
	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$invoiceItem["item_code"].'</td>
	<td align="left">'.$invoiceItem["item_name"].'</td>
	<td align="left">'.$invoiceItem["order_item_quantity"].'</td>
	<td align="left">'.$invoiceItem["order_item_price"].'</td>
	<td align="left">'.$invoiceItem["order_item_final_amount"].'</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Sous-total hors TVA</b></td>
	<td align="left"><b>'.$invoiceValues['order_total_before_tax'].'</b></td>
	</tr>
	<tr>
	
	
	<td align="right" colspan="5">Sous-total TVA incluse: </td>
	<td align="left">'.$invoiceValues['order_total_after_tax'].'</td>
	</tr>
	<tr>
	';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>Cette facture est générée via 2wahka.com</b></td>
	</tr>
	</table>
	';
// create pdf of invoice	
$invoiceFileName = 'Invoice-'.$invoiceValues['order_id'].'.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled',TRUE);
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>   
<html>
style{
.img-fluid{
width:50px;
}
}
</html>