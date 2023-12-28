<?php
$servername = "localhost";
$username = "2wahka_com2wahka";
$password = "Hossam#32";
$dbname = "2wahka_com2wahka";
// Create connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}