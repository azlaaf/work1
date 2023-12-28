<?php
include('statistics_item_action.php');
$rowss = Statistics();
// <style>
// .statistics-input_haeder {
//     background-color: rgb(240, 240, 240);
//     padding: 0 -20px;
// }

// .undrer_line {
//     width: 100% !important;
//     height: 10px !important;
//     border-bottom: 5px solid #7CA7C2;
// }
// </style>
$output = '';
$output .= '<div class="content-wrapper">
    <div class="container mt-5 overflow-hidden">
        <h3 class="text-center" align="center" style="font-size:18px">Statistics</h3>
        <hr>
        <div class="container" style="width:80%;  background-color:rgb(255,255,255);margin-left:10%;  ">
            <div class="container">
                <table>
                    <tr>
                        <td>Item Number :' . $_GET['number'] . '</td>
<td><input readonly type="text" style="visibility: hidden;"></td>
</tr>
<tr>
    <td>Sold last 3 month</td>
    <td></td>
    <td><input readonly type="text" value="' . soldLast3month() . '"></td>
</tr>
<tr>
    <td>Sold last 6 month</td>
    <td></td>
    <td><input readonly type="text" value="' . soldLast6month() . '"></td>
</tr>
<tr>
    <td>Sold last 12 month</td>
    <td></td>
    <td><input readonly type="text" value="' . soldLast12month() . '"></td>
</tr>
<tr>
    <td>Average purchase price </td>
    <td></td>
    <td><input readonly type="text" value="' . number_format((float)AveragePurchasePrice(), 2, '.', '') . '"></td>
</tr>
<tr>
    <td>Average sales price</td>
    <td></td>
    <td><input readonly type="text" value="' . number_format((float)AverageSalesPrice(), 2, '.', '') . '"></td>
</tr>
<tr>
    <td>expected sales next 12 months </td>
    <td></td>
    <td><input readonly type="text"></td>
</tr>
</table>
</div>
<p class="undrer_line"></p>
<div class="container">
    <table>
        <tr>
            <th><input type="text" readonly value="Date" class="text-center statistics-input_haeder"></th>
            <th><input type="text" readonly value="Pcs." class="text-center statistics-input_haeder"></th>
            <th> <input type="text" readonly value="Type" class="text-center statistics-input_haeder"></th>
            <th><input type="text" readonly value="Amount per pcs." class="text-center statistics-input_haeder"></th>
        </tr>
        <tr>';
$row = DateAdd()->fetch(PDO::FETCH_ASSOC);
$output .= '
            <td><input type="text" readonly value="' . $row['value'] . '" class="text-center"></td>
            <td><input type="text" readonly value="' . $row['stock'] . '" class="text-center"></td>
            <td><input type="text" readonly value="Buy" class="text-center"></td>
            <td><input type="text" readonly value="' . $row['cost_price'] . ' MAD" class="text-center"></td>

        </tr>';
foreach ($rowss as $v) {
    $output .= '
        <tr>
            <td><input type="text" readonly value="' . $v['date'] . '" class="text-center"></td>
            <td><input type="text" readonly value="' . $v['q'] . '" class="text-center"></td>
            <td><input type="text" readonly value="' . $v['type'] . '" class="text-center"></td>
            <td><input type="text" readonly value="' . $v['cost'] . ' MAD" class="text-center"></td>

        </tr>';
}
$output .= '
    </table>

</div>

</div>
</div>';

// create pdf of invoice
$invoiceFileName = 'Item-' . $_GET['number'] . '.pdf';
require_once '../dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', TRUE);
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));