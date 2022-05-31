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
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/style_contact.css">
    <script src="https://kit.fontawesome.com/84861a5cc6.js" crossorigin="anonymous"></script>
    <title>Accueil Burger Company</title>
</head>

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

<body class="container">
    <header>
        <div class="img">
            <img src="./Images/LOGO_BURGER_mofif.png">
        </div>
        <div class="titre">
            <h1><span> BURGER Company</span></h1>
            <h3> Pour vous servir</h3>
        </div>
        <nav>
            <a href="./Index.php"> Accueil </a>
            <a href="./contact.php"> Contact </a>
            <a href="./faq.php"> F.A.Q </a>
        </nav>
    </header>
    <main></main>
    <aside>
        <div class="icones">
            <img src="./Images/menu_burger.png" alt="">
            <img src="./Images/burger.png" alt="">
            <img src="./Images/soda.png" alt="">
            <img src="./Images/salad.png" alt="">
            <img src="./Images/cupcake.png" alt="">
        </div>
        <nav class="nav">
            <a href="#">MENUS</a> <br>
            <a href="#">BURGERS</a><br>
            <a href="#"> BOISSONS</a><br>
            <a href="#">SALADES</a><br>
            <a href="#">DESSERTS</a> 
        </nav>
    </aside>
    <footer>
        <h3> &copy 2022</h3>
        <a href="#"> Mentions Légales </a>
    </footer>
    
</body>


</html>