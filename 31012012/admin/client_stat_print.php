<?php
session_start();
if (isset($_GET['email']) & !empty($_GET['email'])) {
    function statClient()
    {
        include './stock_actions/connect.php';
        $id = $_GET['email'];

        $qury = "SELECT invoice_order.date as date ,invoice_order_item.order_item_quantity as q ,stock_items.item_number as number ,invoice_order.order_id as o 
    FROM invoice_order,invoice_order_item ,stock_items 
     WHERE invoice_order_item.order_id=invoice_order.order_id 
     AND invoice_order_item.item_code=stock_items.item_number 
     AND invoice_order.order_receiver_address='$id' ";
        $result = $pdo->prepare($qury);
        if ($result->execute()) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else
            return 0;
    }
}
$output = '';
$output .= '
<div class="content-wrapper">
    <div class="container mt-5 overflow-hidden">

        <h3 class="text-center">Stat</h3>
        <hr>
        <div class="container" style="width:80%;  background-color:rgb(255,255,255);margin-left:10%;  ">
            <div class="container">
                <h5>Entreprise :' . $_GET['entr'] . '</h5>
                <div class="container">
                    <table>
                        <tr>
                            <th><input type="text" readonly value="Date" class="text-center statistics-input_haeder">
                            </th>
                            <th><input type="text" readonly value="Item number"
                                    class="text-center statistics-input_haeder"></th>
                            <th> <input type="text" readonly value="Pcs" class="text-center statistics-input_haeder">
                            </th>
                            <th><input type="text" readonly value="Invoice numer."
                                    class="text-center statistics-input_haeder"></th>
                        </tr>';
foreach (statClient() as $row) {
    $output .= ' <tr>
                            <th><input type="text" readonly value="' . $row['date'] . '" class="text-center ">
                            </th>
                            <th><input type="text" readonly value="' . $row['number'] . '" class="text-center ">
                            </th>
                            <th> <input type="text" readonly value="' . $row['q'] . '" class="text-center ">
                            </th>
                            <th><input type="text" readonly value="' . $row['o'] . '" class="text-center "></th>
                        </tr>';
}
$output .= '  </table>
                    
                </div>

            </div>
        </div>
    </div>
</div';


// create pdf of invoice
$invoiceFileName = 'Client-' . $_GET['email'] . '.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', TRUE);
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));