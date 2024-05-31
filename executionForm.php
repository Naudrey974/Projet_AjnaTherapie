<?php
//connexion à la BD
$bdd = new PDO(
    'mysql:host=localhost;dbname=ajnatherapie',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

//fonction pour inserer un nouveau contact
function insertContact(PDO $bdd,string $nom,string $prenom,string $mail,string $message):void{
    try {
        $requete = $bdd->prepare('INSERT INTO message(nom_expediteur, prenom_expediteur, mail_expediteur, texte_message) 
        VALUE (?,?,?,?)');
        $requete->bindParam(1,$nom,PDO::PARAM_STR);
        $requete->bindParam(2,$prenom,PDO::PARAM_STR);
        $requete->bindParam(3,$mail,PDO::PARAM_STR);
        $requete->bindParam(4,$message,PDO::PARAM_STR);
        $requete->execute();
    } 
    catch (\Exception $e) {
        die('Error : '.$e->getMessage());
    }
}

function cleanInput(?string $value):?string{
    return htmlspecialchars(strip_tags(trim($value)),ENT_NOQUOTES);
} 


//test si le bouton est cliqué
if (isset($_POST["submit"])) {
    //tester si les champs sont remplis
    if (!empty($_POST["nom_contact"]) AND !empty($_POST["prenom_contact"]) AND !empty($_POST["mail_contact"]) AND !empty($_POST["message_contact"])) {
        //nettoyer les inputs
        $nom = cleanInput($_POST["nom_contact"]);
        $prenom = cleanInput($_POST["prenom_contact"]);
        $mail = cleanInput($_POST["mail_contact"]);
        $message = cleanInput($_POST["message_contact"]);                              
        //insertion des valeurs en BD
        insertContact($bdd,$nom,$prenom,$mail,$message);
        //Affichage d'une confirmation d'envoi de message                 
        //echo "<script>alert(\"Merci " .$_POST["prenom_contact"]."! Votre message a bien été envoyé\")</script>";
        header("location:./merci.php"); 
                
        //si on veut traiter l'obligation de compléter les champs coté back:
    }else{
        //test si les champs sont vides
        echo "<script>alert(\"Veuillez remplir tous les champs du formulaire\")</script>";
    }
                                                                
}  

//Fonction pour inscrire un nouvel utilisateur

function insertUtilisateur(PDO $bdd,string $nom,string $prenom,string $mail,string $password,string $tel,):void{
    try {
        $requete = $bdd->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, tel_utilisateur) 
        VALUE (?,?,?,?,?)');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $requete->bindParam(1,$nom,PDO::PARAM_STR);
        $requete->bindParam(2,$prenom,PDO::PARAM_STR);
        $requete->bindParam(3,$mail,PDO::PARAM_STR);
        $requete->bindParam(4,$password,PDO::PARAM_STR);
        $requete->bindParam(5,$tel,PDO::PARAM_STR);
        $requete->execute();
    } 
    catch (Exception $e) {
        die('Error : '.$e->getMessage());
    }
}

// recupération de l'utilisateur par l'adresse email (précision des paramètres utiles pour le traitement des données dans l'application)
function getUtilisateurByMail(PDO $bdd,string $mail){
    try {
        $requete = $bdd->prepare('SELECT id_utilisateur,mail_utilisateur,password_utilisateur,prenom_utilisateur,nom_utilisateur FROM utilisateur WHERE
        mail_utilisateur = ?');
        $requete->bindParam(1,$mail,PDO::PARAM_STR);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    } 
    catch (Exception $e) {
        die('Error : '.$e->getMessage());
    }
}


//test si le bouton est cliqué
if (isset($_POST["submit2"])) {
    //tester si les champs sont remplis
    if (!empty($_POST["nom_utilisateur"]) AND !empty($_POST["prenom_utilisateur"]) AND !empty($_POST["mail_utilisateur"]) AND !empty($_POST["password_utilisateur"]) AND !empty($_POST["password_verification"])AND !empty($_POST["tel_utilisateur"])) {
        //tester la vérif du MP
        if($_POST["password_utilisateur"]===$_POST["password_verification"]){
            //hash du MP
            $hash = password_hash($_POST["password_utilisateur"],PASSWORD_DEFAULT);
            //nettoyer les inputs
            $nom = cleanInput($_POST["nom_utilisateur"]);
            $prenom = cleanInput($_POST["prenom_utilisateur"]);
            $mail = cleanInput($_POST["mail_utilisateur"]);
            $password = cleanInput($_POST["password_utilisateur"]);
                //test si l'utilisateur n'existe pas
                if (empty(getUtilisateurByMail($bdd, $mail))) {
                    //ajouter l'utilisateur en BDD
                    insertUtilisateur($bdd,$nom,$prenom,$mail, $hash,$_POST["tel_utilisateur"]);
                    echo "<script>alert(\" Votre compte est crée! Vous pouvez vous connecter\")</script>";
                    //header("location:./profil.php"); 
                    }
                    else{
                        echo "<script>alert(\" Les informations ne sont pas correctes\")</script>";
                    }      
        }
            
    }
    else{
        //test si les champs sont vides
        echo "<script>alert(\"Veuillez remplir tous les champs du formulaire\")</script>";
    }    
}



//Fonction pour la connexion de l'utilisateur

if(isset($_POST["submit1"])){
   
    if(!empty($_POST["mail_utilisateur"]) AND !empty($_POST["password_utilisateur"])){
        $email = cleanInput($_POST["mail_utilisateur"]);
        $recup = getUtilisateurByMail($bdd,$email);
        var_dump($recup);
        //vérif si le compte existe
        if(!empty($recup)){
            $password = cleanInput($_POST["password_utilisateur"]);
            //test du mot de passe
            if(password_verify($password,$recup["password_utilisateur"])){
                //démarrer une session
                session_start();
                //créer une session
                $_SESSION["nom_utilisateur"] = $recup["nom_utilisateur"];
                $_SESSION["prenom_utilisateur"] = $recup["prenom_utilisateur"];
                $_SESSION["activated"] = true;
                //redirection vers le formulaire
                header('location:./profil.php?'.$_SESSION["id_utilisateur"]);
            }
             else{
                //redirection vers le formulaire
                header('location:./connexion.php?error=1');
            } 
        } else{
            //redirection vers le formulaire
            header('location:./connexion.php?error=2');
        } 
    }
    
}

                       
    

