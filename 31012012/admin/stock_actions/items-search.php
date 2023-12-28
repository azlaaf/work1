<?php
include 'connect.php';
session_start();
// Attempt search query execution
$email = $_SESSION['email'];
try {
    if (isset($_REQUEST["term"])) {
        if (!empty($_REQUEST["term"])) {
            // create prepared statement
            $term=$_REQUEST["term"];
            $sql = "SELECT * FROM stock_items WHERE company_email ='$email' and  (item_number LIKE '%".$term."%' OR item_name LIKE '%".$term."%' OR item_description LIKE '%".$term."%') ";
            $stmt = $pdo->prepare($sql);
           // $term = '%' . $_REQUEST["term"] . '%';
            // bind parameters to statement
           // $stmt->bindParam(":term", $term);
             //$stmt->bindParam(":tt", $email);
            // execute the prepared statement
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo '<tr class="row text-center">';
                    echo '<th width="20px" class="col"><input class="formcontrol Gcheck" type="checkbox" name="s_check"
                        value=' . $row['id_item'] . '></th>';
                    echo '<th class="col">' . $row['item_number'] . '</th>';
                    echo '<td class="col">' . $row['item_name'] . '</td>';

                    echo '<td class="col">' . $row['sale_price'] . '</td>';
                    echo '<td class="col">' . $row['cost_price'] . '</td>';
                    echo   '<td class="col">' . $row['stock'] . '</td>';
                    echo '<td class="col text-success"><i class="fa-sharp fa-solid fa-square-check"></i></td>';
                    echo '</tr>';
                }
            } else {
                echo '<div class="alert alert-secondary">No matching recordsfound</div>';
            }
        }
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close statement
unset($stmt);

// Close connection
unset($pdo);