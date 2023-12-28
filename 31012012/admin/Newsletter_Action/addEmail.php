<?php
class emils
{
    private $emailTable = 'newsletter';
    public function saveEmail($POST, $email)
    {
        $messag = false;
        $x = 0;
        include 'config.php';
        include "stock_actions/connect.php";
        // $lastInsertId = mysqli_insert_id($conn);
        for ($i = 0; $i < count($POST['email']); $i++) {
            $em = $POST['email'][$i];
            $result = $pdo->prepare("SELECT *FROM newsletter WHERE company_email=? AND email=?");
            $result->execute(array($email, $em));
            if ($result->rowCount() == 0) {
                $sqlInsertItem = "
                INSERT INTO " . $this->emailTable . "(company_email, name, email) 
                VALUES ( '$email','" . $POST['name'][$i] . "', '" . $POST['email'][$i] . "')";
                //  mysqli_query($conn, $sqlInsertItem);
                if (mysqli_query($conn, $sqlInsertItem)) {
                    $x++;
                }
            } else {
                $i++;
            }
        }

        if ($x == count($POST['email'])) {
            $messag = true;
        } else {
            $messag = false;
        }
        return $messag;
    }
}