<?php

session_start();

$host = 'localhost';
$dbname = 'burger_company';
$user = 'root';
$mdp = '';
$charset = 'utf8';
//Connexion BDD
try{
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $mdp);
}
catch(PDOException $fail) {
    echo "Erreur : ".$fail->getMessage();
    die();
}

if(isset($_POST['menu'])){
    $menu = $_POST['menu'];
    var_dump($menu);
}
//fin de connexion à la BDD
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css"/>
    <title>Accueil Burger Company</title>
</head>

<body>
    <?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];

        switch($page) {
            case 'menu':
                include('menu/index.php');
                break;

            default:
            include('accueil/accueil.php');
        } 
        else {
            include('accueil/acueil.php');
        }
    }

    ?>

</body>

</html>