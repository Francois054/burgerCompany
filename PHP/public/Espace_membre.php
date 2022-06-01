<?php

// session_start();

// on se connecte à la base de données.
// $host = 'localhost';
// $dbname = 'voiture';
// $user = 'root';
// $mdp = '';
// $charset = 'utf8';

// try{
//     $bdd = new PDO("mysql:host=$host; dbname=$dbname; charset=$charset", $user, $mdp);
// } catch(PDOException $fail){
//     echo "Erreur : ".$fail->getMessage();
//     die();
// }

if(!isset($_SESSION['user']['email'])) {
    header('location:index.php');
    exit();

}
if(isset($_SESSION['user'])){
    $id = $_SESSION['user']['ID'];
  
    $InscrStr = "SELECT * FROM user_vehicule INNER JOIN villes_france_free ON ville_id = ID_ville_id WHERE ID_user = :id";
  
    $InscrQuery = $bdd->prepare($InscrStr);
    $InscrQuery->bindValue(':id', $id, PDO::PARAM_INT);
    $InscrQuery->execute();
    $Inscr= $InscrQuery->fetch();
}
?>

<p id="MEM"><strong> Espace membres </strong></p>

    <h2>Pour modifier vos données personnelles:</h2> <!--(veuillez  
<?php
//  echo '<button type="button"onclick="redirect('.$_SESSION['user']['ID'].')"> cliquer ici </button>';

?>)-->

<form id="update_membre" method="POST" action= "">       
    <input type="texte" name="nom" placeholder="nom" value="<?php echo $Inscr['nom'] ?>" required/>      
    <input type="texte" name="prenom" placeholder="prenom" value="<?php echo $Inscr['prenom'] ?>" required/>
    <input type="texte" name="adresse" placeholder="adresse" value="<?php echo $Inscr['adresse'] ?>" required/>
    <input type="entier" name="gsm" placeholder="téléphone"value="<?php echo $Inscr['gsm'] ?>" required/><br>
    <input type="texte" name="ville" placeholder="ville" value="<?php echo $Inscr['ville_nom'] ?>" required/>
    <input type="email" name="email1" placeholder="email" value="<?php echo $Inscr['email'] ?>" required/>
    <input type="email" name="email2" placeholder="vérifier email" required/>
    <input type="password" name="password1" placeholder="ancien mot de passe" required/>
    <input type="password" name="Npassword1" placeholder="nouveau mot de passe" required/>
    <input type="password" name="Npassword2" placeholder="vérifier nouveau mot de passe" required/> <br><br>
    <button type="submit" id="subButtonM"> Enregistrer </button>
 
</form>
<?php
if(isset($_POST['nom'])){

    if(isset($_POST['ville'])) {
        $villeStr = 'SELECT villes_france_free.ville_id FROM villes_france_free WHERE ville_nom_reel=:ville OR ville_nom_simple=:ville OR ville_nom=:ville';//sélectionne le champ 'nom_reel' de la table 'villes_france_free'
        $query = $bdd->prepare($villeStr);
        $query->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
        $query->execute();
        $ville_Tab = $query->fetch();//retourne un tableau avec ttes les données de la table     
    }

        if ($ville_Tab != null){

            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            $adresse = strip_tags($_POST['adresse']);
            $email = strip_tags($_POST['email1']);
            $mdp = strip_tags($_POST['Npassword1']);
            $gsm = strip_tags($_POST['gsm']);
            $hash = password_hash($mdp, PASSWORD_BCRYPT)  ;
            
            if($_POST['email1'] != $_POST['email2']) {
                echo "Votre email est mal encodé, veuillez ressaisir";
            }
            else{              
                
                if(!password_verify($_POST['password1'], $Inscr['password1'] )) {
                    $erreur = 'Votre ancien Mot de passe est erroné.';
                    echo $erreur;
                } else{
                    
                    if($_POST['Npassword1'] != $_POST['Npassword2']){
                        echo 'Votre nouveau Mot de passe est erroné, veuillez ressaisir';    
                    }
                
                    else {
                        //si les 2 mdp et les 2 emails sont identiques, on se connecte à la bdd
                        $insertStr = 'UPDATE user_vehicule SET nom=:nom, prenom=:prenom, adresse=:adresse, email=:email, password1= :password1, gsm=:gsm, ID_ville_id=:ville WHERE ID_user=:id';
                        $REinscription = $bdd-> prepare ($insertStr);
                        $REinscription->bindValue(':nom', $nom, PDO::PARAM_STR);
                        $REinscription->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                        $REinscription->bindValue(':adresse', $adresse, PDO::PARAM_STR);
                        $REinscription->bindValue(':email', $email, PDO::PARAM_STR);
                        $REinscription->bindValue(':password1', $hash, PDO::PARAM_STR);
                        $REinscription->bindValue(':gsm', $gsm, PDO::PARAM_INT);
                        $REinscription->bindValue(':ville', $ville_Tab['ville_id'], PDO::PARAM_INT);
                        $REinscription->bindValue(':id', $Inscr['ID_user'], PDO::PARAM_INT);
                        $REinscription->execute();
                    }

                echo '<p>la modification a bien été effectuée</p>';
                
            }
        }        
        
    }
}   
?>

    
<!-- <script type="text/javascript">
    function redirect(ID){
    window.location.href="update_inscription.php?ID="+ID
    }
</script> -->