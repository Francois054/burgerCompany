<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="https://kit.fontawesome.com/fb7bc50dd3.js" crossorigin="anonymous"></script>

    <title>BURGER Company</title>
</head>
<body>
    <main>
        <aside>
            <div class="top">
                <img class="logo" src="./Images/LOGO_BURGER_mofif.png" >
            </div>            
            <div class="social">
                <div class="icon">
                    <i class="fa-brands fa-twitter"></i><!--lien vers icone fontawsome-->
                </div>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                </div>
                <div class="icon">
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="icon">
                    <i class="fa-brands fa-skype"></i>
                </div>
                <div class="icon">
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>
            </div>            
            <div class="nav">
                <!-- <div class="left">
                    <img src="./Images/cheeseburger-g0006d9a87_1280.png">
                    <img src="./Images/icones/burger-au-fromage.png">
                    <img src="./Images/icones/boisson-non-alcoolisee.png">
                    <img src="./Images/icones/bol-a-salade-dessine-a-la-main.png">
                    <img src="./Images/icones/dessert.png">
                </div> -->
                <div class="right">
                    <button type="button"onclick="redirect_menu()">MENU</button>
                    <button type="button"onclick="redirect_burger()">BURGER</button>
                    <button type="button"onclick="redirect_boisson()">BOISSON</button>
                    <button type="button"onclick="redirect_salade()">SALADE</button>
                    <button type="button"onclick="redirect_dessert()">DESSERT</button>
                </div>

            </div>
            
            <div class="foot">
                <h5>© Copyright 2022</h5>
                <h6>Designed by <span>Vf</span></h6><!--span pour colorer un bout de texte-->
            </div>
        </aside>

        <section>
        <div class="onglet">
            <a href="./Index.php"> Accueil </a>
            <a href="./contact.php"> Contact </a>
            <a href="./F.A.Q.php>"> F.A.Q </a>
        </div>
            <div class="texte">
                <h1>BURGER Company</h1>
                <hr>
                <h3 class="ligne">Le meilleur dans votre assiette</h3>                
            </div>
        </section>        
    </main>
<script type="text/javascript">
    function redirect_menu(){
        window.location.href="menu.php"
}
</script>
<script type="text/javascript">
    function redirect_burger(){
        window.location.href="burger.php"
}
</script>
<script type="text/javascript">
    function redirect_boisson(){
        window.location.href="boisson.php"
}
</script>
<script type="text/javascript">
    function redirect_salade(){
        window.location.href="salade.php"
}
</script>
<script type="text/javascript">
    function redirect_dessert(){
        window.location.href="dessert.php"
}
</script>
</body>
</html>