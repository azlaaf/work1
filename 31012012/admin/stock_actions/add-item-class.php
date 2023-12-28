<?php

class addClass
{
    private $item_number;
    private $item_name;
    private $sale_price;
    private $cost_price;
    private $item_unit;
    private $item_description;
    private $barcode;
    private $supplier;
    private $stock;
    public function __construct($item_number, $item_name, $sale_price, $cost_price, $item_unit, $stock, $item_description)
    {
        $this->item_number = $item_number;
        $this->item_name = $item_name;
        $this->sale_price = $sale_price;
        $this->cost_price = $cost_price;
        $this->item_unit = $item_unit;
        $this->stock = $stock;
        $this->item_description = $item_description;
    }
    public function Empty()
    {
        $message = "";
        if (
            empty($this->item_number) || empty($this->item_name) || empty($this->sale_price) ||
            empty($this->cost_price) || empty($this->item_unit) || empty($this->item_description) || empty($this->stock)
        ) {
            $message = true;
        } else {
            $message = false;
        }
        return $message;
    }
    public function numberExist($conn)
    {
        $exist = true;
        $email = $_SESSION['email'];
        $qury = $conn->prepare("SELECT item_number FROM stock_items WHERE item_number=? AND company_email=?");
        $qury->execute(array($this->item_number, $email));
        if ($qury->rowCount() > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
    }
    public function addItems($conn)
    {
        $message = true;
        $result = $conn->prepare("INSERT INTO stock_items(company_email,item_number,item_name,sale_price,cost_price,item_unit,stock,item_description)
           VALUES(?,?,?,?,?,?,?,?)");
        $result->execute(array(
            $_SESSION['email'], $this->item_number, $this->item_name, $this->sale_price,
            $this->cost_price, $this->item_unit,  $this->stock, $this->item_description
        ));
        if ($result) {
            $message = true; //"Item added successfully";
        } else {
            $message = false; //"Error of connection try again";
        }
        return $message;
    }
    //update function
    public function update($con, $id)
    {
        $message = true;
        $result = $con->prepare("UPDATE stock_items
        SET item_number = ?, item_name = ?, sale_price=?,cost_price=?,item_unit=?,stock=?,item_description=?
        WHERE id_item=?");
        $result->execute(array(
            $this->item_number, $this->item_name, $this->sale_price,
            $this->cost_price, $this->item_unit, $this->stock, $this->item_description, $id
        ));
        if (!$result) {
            $message = false;
        }
        return $message;
    }
    //select item by id
    public function select($conn, $id)
    {
        $qury = $conn->prepare("SELECT item_number FROM stock_items WHERE id_item=? ");
        $qury->execute(array($id));

        return $qury;
    }
}