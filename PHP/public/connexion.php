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
/*
Page: connexion.php
*/
//à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION

//si le bouton "Connexion" est cliqué
if(isset($_POST['connexion'])){
    // on vérifie que le champ "email" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['email'])){
        echo "Le champ email est vide.";
    }
    else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mdp'])){
            echo "Le champ Mot de passe est vide.";
        }
        else {
            // les champs email & mdp sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
            //le htmlentities() passera les guillemets en entités HTML, ce qui empêchera en partie, les injections SQL
            $email = strip_tags($_POST['email']); 
            $MDP = strip_tags($_POST['mdp']);
            
                       
            
            //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:

            $ConnStr = "SELECT * FROM user WHERE email = :email";
            $query = $bdd->prepare($ConnStr);
            $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $query->execute();
            $Conn_Tab = $query->fetch();
            
            if($Conn_Tab == NULL) {
                echo "Adresse email inconnue !";
            }
            else {
                if (!password_verify($MDP, $Conn_Tab['password1'])){
                    echo'le mot de passe est invalide';
                }
                else{
                    //on ouvre la session avec $_SESSION:
                    //la session peut être appelée différemment et son contenu aussi peut être autre chose que l'email                
                    
                    $_SESSION['user']['nom'] = $Conn_Tab['nom'];
                    $_SESSION['user']['prenom'] = $Conn_Tab['prenom'];
                    $_SESSION['user']['adresse'] = $Conn_Tab['adresse'];
                    $_SESSION['user']['email'] = $Conn_Tab['email'];
                    $_SESSION['user']['password1'] = $Conn_Tab['password1'];
                    $_SESSION['user']['adresse'] = $Conn_Tab['adresse'];
                    $_SESSION['user']['gsm'] = $Conn_Tab['gsm'];
                    $_SESSION['user']['ID'] = $Conn_Tab['ID_user'];
                    $_SESSION['user']['ville'] = $Conn_Tab['ID_ville_id'];
                    $_SESSION['user']['role'] = $Conn_Tab['ID_role'];
                
                    echo "<P>Vous êtes à présent connecté !</P>";
                
                    header('location: index.php?page=espaceMembre');               
                }
            }            
        }
    }
}
?>

<!-- 
Les balises <form> indiquent que c'est un formulaire
on lui demande de faire fonctionner la page connexion.php une fois le bouton "Connexion" cliqué
on lui dit également que c'est un formulaire de type "POST" (récupéré via $_POST en PHP)
Les balises <input> sont les champs de formulaire
type="text" sera du texte
type="password" sera des petits points noir (texte caché)
type="submit" sera un bouton pour valider le formulaire
name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP (récupéré via $_POST["nom de l'input"] en PHP)
 -->

<form id="CONN" action="" method="post">
    <input type="email" name="email" placeholder="Votre Email" required/>
    <br />
    <input type="password" name="mdp" placeholder="Mot de Passe" required/>
    <br />
    <input type="submit" name="connexion" value="Connexion" />
    <a id="redir" href="./redirection_MDP" > Mot de passe oublié? </a>
</form>   
      
