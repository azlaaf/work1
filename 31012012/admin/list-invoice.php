<?php
session_start();
$email=$_SESSION['email'];
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include('config.php');
include('invoice_class.php');
$invoice = new Invoice();

?>


<div class="container-fluid plan">
    
    <div style="margin-left: 113px;
    margin-right: -115px;" class="row">

        <div class="col-md-8 mx-auto">
            <div class="card-header">
                <div class="breadcrumb-item" >
     <!--<a href="https://2wahka.com/31012012/admin/index.php" style="float:right;">Home</a>-->
   
                <h3 class="text-center text-uppercase">
                    Invoice Archive
                </h3>

          </div>

            </div>

            <div class="card-body">
                <div class="list-invoice-buttons ">
                    <a href="#" target="_blank" class="btn btn-sm btn-warning mx-2" id="imerimer">
                        <i class="fas fa-print" ></i> Imprimer</a>
            <span></span>
                    <button type="submit" class="btn btn-sm btn-success mx-2 btn-demo" id="whatsapp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>Whatsapp
                    </button>
                </div>
                <div class="table-responsive">

                    <table id="employee_data" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Customer</th>
                                <th>Phone Number</th>
                                <th>Invoice sum</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <?php
                            //table of listing invoices
                            $invoiceList = $invoice->getInvoiceList();
                            foreach ($invoiceList as $invoiceDetails) {

                                echo '
              <tr>
                <td>' . $invoiceDetails["order_id"] . '</td>
                <td>' . $invoiceDetails["order_receiver_name"] . '</td>
                <td>' . $invoiceDetails["phone"] . '</td>
                <td> MAD ' . $invoiceDetails["order_total_after_tax"] . '</td>
                <td>' . $invoiceDetails["date"] . '</td>
                
              <td><input id="Nom_id_check"  class="formcontrol imperimer_check" type="checkbox" name="imperimer_check" 
                value=' . $invoiceDetails['order_id'] . '></td>

              </tr>
              
            ';
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <script>

        $(document).ready(function() {
            $('#employee_data').DataTable({
                scrollY: '200',
                deferRender: true,
                scrollCollapse: true,
                paging: false,
                scroller: true,

            });
            $("input[type='search']").attr("placeholder", "   search by name");
            $("#employee_data_info").text(`${$("#employee_data_info").text().replace("entries", "Total")}`);
        });
        //imerimer invoice
$("#imerimer").click(function() {
            $.each($("input[name='imperimer_check']:checked"), function() {
                if ($("input[name='imperimer_check']:checked").length === 1) {
                    const res = window.location.href.charAt(window.location.href.length - 1);
                   // console.log(res)
                    let courentUrl
                    if (res === "#") {
                        courentUrl = window.location.href.slice(0, -14)
                    } else {
                        courentUrl = window.location.href.slice(0, -15)
                    }
                    window.location.replace(
                        `print_invoice.php?invoice_id=${$(this).val()}`,'_blank')
                }
            })
        });

        </script>
                </div>
</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
   
    $(".btn-demo").on('click',function(){
        var i=-1;
        $("#employee_data tr").each(function() {
            
            var currentRow =  $(this);
            console.log($("[id=Nom_id_check]:eq("+i+")").prop('checked'),i)
            if($("[id=Nom_id_check]:eq("+i+")").prop('checked')){
            var col1 = currentRow.find("td:eq(0)").text().trim();
            var col2 = currentRow.find("td:eq(1)").text().trim();
            var col3 = currentRow.find("td:eq(2)").text().trim();
            var col4 = currentRow.find("td:eq(3)").text().trim();
            var col5 = currentRow.find("td:eq(4)").text().trim();
            
            var data = col1 + "\n"+ col2 + "\n"+col3+"\n"+col4+"\n"+col5+"\n";
            //alert(data);
            
            var url = `https://wa.me/${col3}`;
        
            window.open(url, '_blank').focus();

            /* + "Name: " + col2 + "%0a"
             + "Phone: " + col3 + "%0a"
             + "Invoice Number: " + col1 + "%0a";*/

            
            }
            i++;
                
                
        });
       

      
    })
})
        
   
 



</script>

<?php
include ('includes/footer.php');
?>