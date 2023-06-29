<?php

function getConnectBdd()
{
    try {
        $bdd = new PDO('mysql:dbname=mvc;host=localhost;charset=utf8', 'root');
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>
