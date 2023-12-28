<?php
include '../stock_actions/connect.php';
session_start();
$email = $_SESSION['email'];
try {
    if (isset($_REQUEST["term"])) {
        if (!empty($_REQUEST["term"])) {
            // create prepared statement
            $sql = "SELECT * FROM newsletter WHERE company_email = :tt and name LIKE :term OR email LIKE :term";
            $stmt = $pdo->prepare($sql);
            $term = '%' . $_REQUEST["term"] . '%';
            // bind parameters to statement
            $stmt->bindParam(":term", $term);
            $stmt->bindParam(":tt", $email);
            // execute the prepared statement
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo '<tr class="row text-center">';
                    echo '<th width="2%" class="col"><input class="formcontrol Gcheck" type="checkbox"
                    name="s_check" value=' . $row['Id'] . '>
                            </th>';
                    echo '<td width="49%" class="col">' . $row['email'] . '</td>';
                    echo '<td width="49%" class="col">
                    ' . $row['name'] . '</td>';
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