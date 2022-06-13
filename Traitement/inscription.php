<?php
// on se connecte à la base de données.
// $host = 'localhost';
// $dbname = 'burger_company';
// $user = 'root';
// $mdp = '';
// $charset = 'utf8';

// try{
//     $bdd = new PDO("mysql:host=$host; dbname=$dbname; charset=$charset", $user, $mdp);
// } catch(PDOException $fail){
//     echo "Erreur : ".$fail->getMessage();
//     die();
// }
// on verifie que l'utilisateur a correctement rempli le formulaire

if (isset($_POST['nom'])) {

    if(isset($_POST['ville'])) {
        $villeStr = 'SELECT villes_france_free.ville_id FROM villes_france_free WHERE ville_nom_reel=:ville OR ville_nom_simple=:ville OR ville_nom=:ville';//sélectionne le champ 'nom_reel' ou 'nom_simple' ou 'nom' de la table 'villes_france_free'
        $query = $bdd->prepare($villeStr);
        $query->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
        $query->execute();
        $ville_Tab = $query->fetch();//retourne un tableau avec ttes les données de la table     
    }
            
     
//on verifie que les emails et les password sont identiques
        if ($ville_Tab != null){
            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            $adresse = strip_tags($_POST['adresse']);
            $email = strip_tags($_POST['email1']);
            $mdp = htmlspecialchars($_POST['password1']);
            $gsm = strip_tags($_POST['gsm']);
            $hash = password_hash($mdp, PASSWORD_BCRYPT)  ;    

            if(($_POST['password1'] != $_POST['password2']) OR ($_POST['email1'] != $_POST['email2'])){
                $erreur = 'les passwords ou email sont différents.';
                echo $erreur;
            }
            else{
                $ConnStr = "SELECT * FROM user WHERE email = :email";// va sélectionner les emails dans la table user-vehicule.
                $query = $bdd->prepare($ConnStr);
                $query->bindValue(':email', $_POST['email1'], PDO::PARAM_STR);
                $query->execute();
                $Conn_Tab = $query->fetch();

                    if(($Conn_Tab != NULL)){// vérifie que l'email saisit n'est pas existant dans la base de donnée.
                        echo 'Adresse email déjà existante, saisir une autre adresse !';
                        }
                    else {
                        //si les 2 mdp et les 2 emails sont identiques, on se connecte à la bdd
                        $insertStr = 'INSERT INTO user(ID_user, nom, prenom, adresse, email, password1, gsm, ID_ville_id, ID_role) VALUES (NULL, :nom, :prenom, :adresse, :email, :password1, :gsm, :ville, :role1)';
                        $Inscription = $bdd-> prepare ($insertStr);
                        $Inscription->bindValue(':nom', $nom, PDO::PARAM_STR);
                        $Inscription->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                        $Inscription->bindValue(':adresse', $adresse, PDO::PARAM_STR);
                        $Inscription->bindValue(':email', $email, PDO::PARAM_STR);
                        $Inscription->bindValue(':password1', $hash, PDO::PARAM_STR);
                        $Inscription->bindValue(':gsm', $gsm, PDO::PARAM_INT);
                        $Inscription->bindValue(':ville', $ville_Tab['ville_id'], PDO::PARAM_INT);
                        $Inscription->bindValue(':role1', 1, PDO::PARAM_INT);
                        $Inscription->execute();
                    }
            }
        }
                        
    }           


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_inscription.css">
    <title>INSCRIPTION</title>
</head>



<body>
    <div>            
        <form id="form_Inscr" method="POST" action= "">
            <h2> INSCRIPTION </h2>      
            <input type="texte" name="nom" placeholder="nom" required/>      
            <input type="texte" name="prenom" placeholder="prenom" required/>
            <input type="texte" name="adresse" placeholder="adresse" required/>
            <input type="entier" name="gsm" placeholder="téléphone"required/>
            <input type="texte" name="ville" placeholder="ville"required/>
            <input type="email" name="email1" placeholder="email" required/>
            <input type="email" name="email2" placeholder="vérifier email" required/>
            <input type="password" name="password1" placeholder="mot de passe" required/>
            <input type="password" name="password2" placeholder="vérifier mot de passe" required/>            
            
            <button type="submit" id="subButtonI">Enregistrer</button>
        </form>
    </div>
</body>
</html>