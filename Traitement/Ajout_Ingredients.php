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

if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['role'] == 2 ) {
    if(isset($_POST['insertIngrt'])){
        $Ingrt = $_POST['insertIngrt'];    
                        
        $queryStr = 'SELECT ingredients.nom FROM ingredients';//sélectionne le champ 'nom' de la table 'ingredients'
        $query = $bdd -> query($queryStr);
        $exist=false;
        $Ingrt_Tab = $query -> fetchAll();//retourne un tableau avec ttes les données de la table
        foreach($Ingrt_Tab as $tab){
            if ($Ingrt==$tab['nom']){
                $exist=true;
            }
        }
            if ($exist==false){
                $insertStr = 'INSERT INTO ingredients(ID, nom) VALUES (NULL, :nom)';
                $Iquery = $bdd-> prepare ($insertStr);
                $Iquery-> bindValue(':nom', $Ingrt, PDO::PARAM_STR);
                $Iquery->execute();
            }
    }
        
    
 
?>
        
    <form id="CONN" method="POST" action= "">       
        <input type="ingédient" name="insertIngrt" placeholder="ingrédient">                  
        <input type="submit" value="Enregistrer"/>
    </form>
     

    
<?php
 }
//  else {
//     header('location:home.php');
// }

?>

   


