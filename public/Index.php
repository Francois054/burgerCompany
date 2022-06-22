<?php
include('../models/config/database.php');
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/assets/CSS/style.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_connexion.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_Inscription.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_contact.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_home.css">
    <link rel="stylesheet" href="../public/assets/CSS/style_FAQ.css">
    <title>BURGER Company</title>
</head>

<body>
    
    <header>
        <nav class="nav1">
            <a class="navalt1" href="index.php?page=home"> Accueil </a>
            <a class="navalt1" href="index.php?page=inscription"> Inscription </a>
            <a class="navalt1" href="index.php?page=connexion"> Connexion </a>
            <a class="navalt1" href="index.php?page=contact"> Contact </a>
            <a class="navalt1" href="index.php?page=FAQ"> F.A.Q </a>
            <a class="navalt1" href="index.php?page=Ajout_Ingredients"> Ajout ingrédients </a>
            
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
        <div id="logo">
            <img class="logo" src="../public/assets/Images/LOGO_BURGER_mofif.png">
        </div>

        <nav class="nav2">
            <a class="navalt2" href="index.php?page=menu">MENUS</a> <br>
            <a class="navalt2" href="index.php?page=burger">BURGERS</a><br>
            <a class="navalt2" href="index.php?page=boisson"> BOISSONS</a><br>
            <a class="navalt2" href="index.php?page=salade">SALADES</a><br>
            <a class="navalt2" href="index.php?page=dessert">DESSERTS</a> 
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
            case 'burger':
                include('../traitement/burger.php');
                break;
            case 'boisson':
                include('../traitement/boisson.php');
                break;
            case 'salade':
                include('../traitement/salade.php');
                break;
            case 'dessert':
                include('../traitement/dessert.php');
                break;
            case 'Ajout_Ingredients':
                include('../traitement/Ajout_Ingredients.php');
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
    // else{
    //     include('../traitement/home.php');
    // }
?></main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>
