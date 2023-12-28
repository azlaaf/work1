	var count = $(".itemRow").length;
	 $(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  

	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
		htmlRows += '<td><input type="number" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off"></td>';          
		htmlRows += '<td><input type="text" readonly name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>'; 
		htmlRows += '<td><input type="number" name="discount[]" id="discount_'+count+'" class="form-control discount" autocomplete="off"></td>'; 

		htmlRows += '<td><input type="number" readonly name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="number" readonly name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});	
	
$(document).on('blur', "[id^=quantity_]", function(){
		stock=window.sessionStorage.getItem('stock')
		const quantity = $(this).val();
		        if (quantity > stock) {
					$(this).val(0)
					$("[id^=productCode_]").val(0)
					$("[id^=productName_]").val(0)
					$("[id^=price_]").val(0)
		           alert("the quantity available is not enough for this quantity")
		        }else{
					calculateTotal();
					window.sessionStorage.clear()
				}
		
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=discount_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {
			$('#amountDue').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				dataType: "json",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response.status == 1) {
						$('#'+id).closest("tr").remove();
					}
				}
			});
		} else {
			return false;
		}
	});
});	
function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		let discount  = $('#discount_'+id).val();
		let total;
		if(!quantity) {
			quantity = 1;
		}if(discount==0){
			total = price*quantity ;
		}else if(!discount){
			total = price*quantity ;
		}else{
			total = price*quantity ;
		   let d=total*discount/100;
			total-=d;
		}
		
		$('#total_'+id).val(parseFloat(total));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount));	
	var taxRate = $("#taxRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		$("#taxTotal").val(subTotal*taxRate/100)
		var taxAmount = subTotal*taxRate/100;
		$('#taxAmount').val(taxAmount);
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount);
		$('#totalAftertax').val(subTotal);		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {		
			$('#amountDue').val(subTotal);
		}
	}
}

 