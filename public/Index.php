<?php

// session_start();

// $host = 'localhost';
// $dbname = 'burger_company';
// $user = 'root';
// $mdp = '';
// $charset = 'utf8';
//Connexion BDD
// try{
//     $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $mdp);
// }
// catch(PDOException $fail) {
//     echo "Erreur : ".$fail->getMessage();
//     die();
// }

// if(isset($_POST['menu'])){
//     $menu = $_POST['menu'];
//     var_dump($menu);
// }
//fin de connexion à la BDD
?>

<!DOCTYPE html>
<html lang="fr"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/CSS/style.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_connexion.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_Inscription.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_contact.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_home.css">
    <title>BURGER Company</title>
</head>

<body>
    
    <header>
        <nav>
            <a class="navalt" href="index.php?page=home"> Accueil </a>
            <a class="navalt" href="index.php?page=inscription"> Inscription </a>
            <a class="navalt" href="index.php?page=connexion"> Connexion </a>
            <a class="navalt" href="index.php?page=contact"> Contact </a>
            <a class="navalt" href="index.php?page=FAQ"> F.A.Q </a>
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
            <img class="logo" src="../public/assets/Images/LOGO_BURGER_mofif.png">
        </div>

        <nav class="nav">
            <a class="navalt" href="./traitement/menu.php">MENUS</a> <br>
            <a class="navalt"href="./traitement/burger.php">BURGERS</a><br>
            <a class="navalt"href="./traitement/boisson.php"> BOISSONS</a><br>
            <a class="navalt"href="./traitement/salade.php">SALADES</a><br>
            <a class="navalt"href="./traitement/dessert.php">DESSERTS</a> 
        </nav>
        <div class="foot">
            <h3 class="copy"> &copy 2022</h3>
            <a class="mention" href="#"> Mentions Légales </a>
        </div>
    </aside>
    <main>
<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];

        switch($page) {
            case 'menu':
                include('../traitement/menu.php');
                break;
            case 'contact':
                include('../traitement/contact.php');
                break;
            case 'inscription':
                include('../traitement/inscription.php');
                break;
            case 'connexion':
                include ('../traitement/connexion.php');
                break;
                case 'FAQ':
                    include ('../traitement/FAQ.php');
                    break;
            default:
            include('../traitement/home.php');
        } 
    }
    else{
        include('../traitement/home.php');
    }
?></main>

   
</body>
</html>
