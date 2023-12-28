<?php

function soldLast3month()
{
    include 'connect.php';
    $id = $_GET['id'];
    $qury = "SELECT count(invoice_order_item.order_item_quantity) as value FROM invoice_order,invoice_order_item ,stock_items  WHERE DATEDIFF(CURRENT_DATE(),invoice_order.date)<=90 AND invoice_order_item.order_id=invoice_order.order_id AND invoice_order_item.item_code=stock_items.item_number AND stock_items.id_item=?  and stock_items.item_name=invoice_order_item.item_name AND stock_items.company_email=? AND invoice_order.user=stock_items.company_email ";
    $result = $pdo->prepare($qury);
    if ($result->execute(array($id, $_SESSION['email']))) {
        return $result->fetch(PDO::FETCH_ASSOC)['value'];
    } else
        return 0;
}
function soldLast6month()
{
    include 'connect.php';
    $id = $_GET['id'];
    $qury = "SELECT count(invoice_order_item.order_item_quantity) as value FROM invoice_order,invoice_order_item ,stock_items  WHERE DATEDIFF(CURRENT_DATE(),invoice_order.date)<=180 AND invoice_order_item.order_id=invoice_order.order_id AND invoice_order_item.item_code=stock_items.item_number AND stock_items.id_item=?  and stock_items.item_name=invoice_order_item.item_name AND stock_items.company_email=? AND invoice_order.user=stock_items.company_email ";
    $result = $pdo->prepare($qury);
    if ($result->execute(array($id, $_SESSION['email']))) {
        return $result->fetch(PDO::FETCH_ASSOC)['value'];
    } else
        return 0;
}
function soldLast12month()
{
    include 'connect.php';
    $id = $_GET['id'];
    $qury = "SELECT count(invoice_order_item.order_item_quantity) as value FROM invoice_order,invoice_order_item ,stock_items  WHERE DATEDIFF(CURRENT_DATE(),invoice_order.date)<=365 AND invoice_order_item.order_id=invoice_order.order_id AND invoice_order_item.item_code=stock_items.item_number AND stock_items.id_item=?  and stock_items.item_name=invoice_order_item.item_name AND stock_items.company_email=? AND invoice_order.user=stock_items.company_email ";
    $result = $pdo->prepare($qury);
    if ($result->execute(array($id, $_SESSION['email']))) {
        return $result->fetch(PDO::FETCH_ASSOC)['value'];
    } else
        return 0;
}
/**------------------------------------------------------------------------*/
function AveragePurchasePrice()
{ //BuyItem()
    $sumpsc = 0;
    $pcsXcost = 0;
    $value = BuyItem();
    for ($i = 0; $i < count($value); $i++) {
        $sumpsc =  $sumpsc + $value[$i]['q'];
        $pcsXcost =  $pcsXcost + ($value[$i]['q'] * $value[$i]['cost']);
    }
    if ($sumpsc && $pcsXcost) {
        return ($pcsXcost / $sumpsc);
    } else
        return 0;
}

/**------------------------------------------------------------------------*/
function AverageSalesPrice()
{   ///Soldtem()
    $sumpsc = 0;
    $pcsXcost = 0;
    $value = Soldtem();
    for ($i = 0; $i < count($value); $i++) {
        $sumpsc =  $sumpsc + $value[$i]['q'];
        $pcsXcost =  $pcsXcost + ($value[$i]['q'] * $value[$i]['cost']);
    }
    if ($sumpsc && $pcsXcost) {
        return ($pcsXcost / $sumpsc);
    } else
        return 0;
}
/**------------------------------------------------------------------------*/
//date of add item 
function DateAdd()
{
    include 'connect.php';
    $id = $_GET['id'];
    $qury = "SELECT date as value,	stock,cost_price FROM stock_items WHERE id_item=$id";
    $result = $pdo->prepare($qury);
    if ($result->execute()) {
        return $result;
    } else
        return 0;
}
function BuyItem()
{
    include 'connect.php';
    $id = $_GET['id'];
    $qury = "SELECT r_date as date, PC_received as q ,cost FROM receive_item WHERE id_item=$id";
    $result = $pdo->prepare($qury);
    if ($result->execute()) {
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $array1 = array("type" => "Buy");
        for ($i = 0; $i < count($result); $i++) {
            $result[$i] = array_merge($result[$i], $array1);
        }
        return $result;
    } else
        return 0;
}
function Soldtem()
{
    include 'connect.php';
    $id = $_GET['id'];
    $qury = "SELECT invoice_order.date as date, invoice_order_item.order_item_quantity as q , invoice_order_item.order_item_price as cost FROM invoice_order,invoice_order_item ,stock_items  WHERE invoice_order_item.order_id=invoice_order.order_id AND invoice_order_item.item_code=stock_items.item_number AND stock_items.id_item=?  and stock_items.item_name=invoice_order_item.item_name AND stock_items.company_email=? AND invoice_order.user=stock_items.company_email ";
    $result = $pdo->prepare($qury);
    if ($result->execute(array($id, $_SESSION['email']))) {
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $array1 = array("type" => "Sold");
        for ($i = 0; $i < count($result); $i++) {
            $result[$i] = array_merge($result[$i], $array1);
        }
        return $result;
    } else
        return 0;
}
//Sort array by date
function Statistics()
{
    function sort_by_date($a, $b)
    {
        $a = strtotime($a['date']);
        $b = strtotime($b['date']);
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    $result = array_merge(Soldtem(), BuyItem());
    usort($result, "sort_by_date");
    return $result;
}