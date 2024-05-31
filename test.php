<?php
// Inclure le fichier de connexion à la base de données
include_once 'connexion.php';

// Fonction pour la connexion de l'utilisateur
function loginUtilisateur($email, $password) {
    // Etablir la connexion à la base de données
    $bdd = connectDB();

    try {
        // Préparer la requête pour récupérer l'utilisateur avec l'email donné
        $requete = $bdd->prepare('SELECT id_utilisateur, password_utilisateur FROM utilisateur WHERE mail_utilisateur = ?');
        $requete->bindParam(1, $email, PDO::PARAM_STR);
        $requete->execute();
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe
        if ($utilisateur) {
            // Vérifier si le mot de passe correspond
            if (password_verify($password, $utilisateur['password_utilisateur'])) {
                // Le mot de passe correspond, retourner l'ID de l'utilisateur
                return $utilisateur['id_utilisateur'];
            } else {
                // Le mot de passe ne correspond pas
                return false;
            }
        } else {
            // L'utilisateur n'existe pas
            return false;
        }
    } catch (PDOException $e) {
        // Gérer les erreurs éventuelles de la base de données
        die('Erreur : ' . $e->getMessage());
    }
}

// Exemple d'utilisation de la fonction loginUtilisateur
$email = 'exemple@example.com';
$password = 'mot_de_passe';

$utilisateur_id = loginUtilisateur($email, $password);

if ($utilisateur_id) {
    echo "L'utilisateur est connecté avec l'ID : $utilisateur_id";
} else {
    echo "L'email ou le mot de passe est incorrect.";
}
?>