<?php
    try
    {
        // database connection
     $bdd = new PDO('mysql:host=localhost;dbname=projet7;charset=utf8', 'root', '');}
     catch (Exception $e)
     {
        die('Erreur db : ' . $e->getMessage());
     }
 ?>

 