<?php
include 'connect.php';
$error = false;
$msg = false;
if (!empty($_GET['id'])) {
    if (isset($_POST['submit'])) {
        //grabbing the data
        $pcs = htmlspecialchars($_POST['p_receive']);
        $stock = htmlspecialchars($_POST['stock']);
        $date = htmlspecialchars($_POST['r_date']);
        $cost = htmlspecialchars($_POST['cost']);
        $id = $_GET['id'];
        //instantiate data
        $new = new receive($pcs, $stock, $date, $cost);
        if ($new->Empty()) {
            $error = "Please enter all information";
        } else {
            // add items
            if ($new->addReceive($pdo, $id)) {
                $msg = "Item receive successfully";
            } else {
                $error = "Error of connection try again";
            }
        }
    }
}
class receive
{
    private $psc;
    private $stock;
    private $date;
    private $cost;
    public function __construct($pcs, $stock, $date, $cost)
    {
        $this->psc = $pcs;
        $this->stock = $stock;
        $this->date = $date;
        $this->cost = $cost;
    }

    public function Empty()
    {
        $message = "";
        if (
            empty($this->psc) || empty($this->stock) || empty($this->date) ||
            empty($this->cost)
        ) {
            $message = true;
        } else {
            $message = false;
        }
        return $message;
    }
    public function addReceive($conn, $id)
    {
        $message = true;
        $result = $conn->prepare("INSERT INTO receive_item(id_item,PC_received,stock,r_date,cost)
           VALUES(?,?,?,?,?)");
        $result->execute(array(
            $id, $this->psc, $this->stock, $this->date, $this->cost
        ));
        if ($result) {
            $message = true; //"Item added successfully";
            $qury = $conn->query("SELECT stock FROM stock_items WHERE id_item=$id ");
            $row = $qury->fetch(PDO::FETCH_BOTH);
            $n = $this->stock;
            $result = $conn->prepare("UPDATE stock_items
            SET stock=? WHERE id_item=?");

            $result->execute(array(
                $n, $id
            ));
        } else {
            $message = false; //"Error of connection try again";
        }
        return $message;
    }
}