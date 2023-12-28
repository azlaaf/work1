<?php

    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=2wahka_com2wahka;charset=utf8", "2wahka_com2wahka");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>

