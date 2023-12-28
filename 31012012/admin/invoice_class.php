<?php
session_start();

class Invoice{
	private $host  = 'localhost';
    private $user  = '2wahka_com2wahka';
    private $password   = 'Hossam#32';
    private $database  = "2wahka_com2wahka";   
	private $invoiceUserTable = 'invoice_user';	
    private $invoiceOrderTable = 'invoice_order';
	private $invoiceOrderItemTable = 'invoice_order_item';
	private $dbConnect = false;

    
	private function getData($sqlQuery) {
	  include('config.php');
		$result = mysqli_query($conn, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->conn));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->conn));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

			
	public function saveInvoice($POST,$user) {
	   include 'config.php';
	   $sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(order_receiver_name, order_receiver_address, order_total_before_tax, order_total_after_tax,user,order_receiver_ville,order_receiver_cp,type) 
			VALUES ('".$POST['companyName']."', '".$POST['adresse']."', '".$POST['subTotal']."', '".$POST['totalAftertax']."','".$_SESSION['email']."','".$POST['ville']."','".$POST['cp']."','invoice')";		
		mysqli_query($conn, $sqlInsert);
		$lastInsertId = mysqli_insert_id($conn);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "
			INSERT INTO ".$this->invoiceOrderItemTable."(order_id,item_code, item_name, order_item_quantity, order_item_price,order_item_final_amount) 
			VALUES ( '$lastInsertId','".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
				$q = (int)$POST['quantity'][$i];
				$id = $POST['productCode'][$i];
				$result = "UPDATE stock_items SET stock=stock-$q WHERE item_number=$id AND company_email='$user'";
				mysqli_query($conn, $result);
		    	mysqli_query($conn,$sqlInsertItem);
		}       
	}
		
	public function getInvoiceList(){
	    $email=$_SESSION['email'];
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE  user='$email'";
		return  $this->getData($sqlQuery);
	}	
	public function getuser(){
	    include('config.php');
		$sqlQuery = "
			SELECT * FROM user
			WHERE email = '".$_SESSION['email']."'";
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function getInvoice($invoiceId){
	    include('config.php');
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user = '".$_SESSION['email']."' AND order_id = '$invoiceId'";
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}	
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE order_id = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}

	
}
?>