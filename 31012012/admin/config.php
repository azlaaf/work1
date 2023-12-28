<?php
$conn = new mysqli("localhost", "root", "", "2wahka_com2wahka");

// check connection
if ($conn->connect_errno) {
    die("Connect failed: ".$conn->connect_error);

}