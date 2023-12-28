<?php
ob_start();
//session_start();
$email = $_SESSION['email'];
include('stock_actions/connect.php');

$mes = false;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//slecte the  users
$query = "SELECT * FROM newsletter where company_email='$email'";
$result = $pdo->query($query);
$row = $result->fetchAll(PDO::FETCH_ASSOC);
//print_r($row);
require 'mailer/autoload.php';
if (isset($_POST['send'])) {

    $email = $_SESSION['email'];
    $sub = htmlspecialchars($_POST['subject']);
    $text = htmlspecialchars($_POST['content']);
    $file_name = $_FILES['Banner']['tmp_name'];
    $fromserver = "oha@marokkobizit.com";
    $userNam = "oha@marokkobizit.com";
    $pas = "0648270856";
    for ($i = 0; $i < count($row); $i++) {
        $body = "<h3>Hello  " . $row[$i]['name'] . "</h3>";
        $body .= "<br> " . $text;
        $email_to = $row[$i]['email'];
        $subject = $sub;
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Host = "send.one.com";
        $mail->SMTPAuth = true;
        $mail->Username = $userNam;
        $mail->Password = $pas;
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = "oha@marokkobizit.com";
        $mail->FromName = "MBID";
        $mail->Sender = $fromserver;
        if ($_FILES['Banner']['tmp_name']) {
            $mail->AddAttachment($file_name, "Bnner/image.jpg");
        }

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $mes = false;
        } else {
            $mes = true;
        }
    }
}