<?php
session_start();
unset($_SESSION['email']);
header('location: ../admin/login.php');