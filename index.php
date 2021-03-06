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
<html lang="fr"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>BURGER Company</title>
</head>

<body>
    
    <header>
        <nav>
            <a class="navalt" href="./index.php"> Accueil </a>
            <a class="navalt" href="./inscription.php"> Inscription </a>
            <a class="navalt" href="./connexion.php"> Connexion </a>
            <a class="navalt" href="./contact.php"> Contact </a>
            <a class="navalt" href="./faq.php"> F.A.Q </a>
        </nav>
    </header>

    <aside>
        <!-- <div class="icones">
            <img src="./Images/cheeseburger-g0006d9a87_1280.png">
            <img src="./Images/icones/burger-au-fromage.png">
            <img src="./Images/icones/boisson-non-alcoolisee.png">
            <img src="./Images/icones/bol-a-salade-dessine-a-la-main.png">
            <img src="./Images/icones/dessert.png">
        </div> -->
        <div>
            <img class="logo" src="./Images/LOGO_BURGER_mofif.png">
        </div>

        <nav class="nav">
            <a class="navalt" href="#">MENUS</a> <br>
            <a class="navalt"href="#">BURGERS</a><br>
            <a class="navalt"href="#"> BOISSONS</a><br>
            <a class="navalt"href="#">SALADES</a><br>
            <a class="navalt"href="#">DESSERTS</a> 
        </nav>

        <h3 class="copy"> &copy 2022</h3>
        <a class="mention" href="#"> Mentions Légales </a>
    </aside>
    
    <main>
        <h1>Burger Company</h1>
        <h2>Le meilleur dans votre assiette !</h2>
    </main>


    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   
</body>
</html>

<?php
    // if(isset($_GET['page'])){
    //     $page = $_GET['page'];

    //     switch($page) {
    //         case 'menu':
    //             include('menu/index.php');
    //             break;

    //         default:
    //         include('index.php');
    //     } 
    // }
?>