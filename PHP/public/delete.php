<?php
$host = 'localhost';
$dbname = 'burger_company';
$user = 'root';
$mdp = '';
$charset = 'utf8';

try{
    $bdd = new PDO("mysql:host=$host; dbname=$dbname; charset=$charset", $user, $mdp);
} catch(PDOException $fail){
    echo "Erreur : ".$fail->getMessage();
    die();
}

$id=$_GET['ID'];
echo "$id";

$queryStr = 'DELETE FROM menu WHERE menu.ID_menu= :id';
$query=$bdd->prepare($queryStr);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();

header('location: index.php');

?>