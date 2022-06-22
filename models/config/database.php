<?php

$host = 'localhost';
$dbname = 'burger_company';
$user = 'root';
$mdp = '';
$charset = 'utf8';
try{
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $mdp);
}
catch(PDOException $fail) {
    echo "Erreur : ".$fail->getMessage();
    die();
}
?>