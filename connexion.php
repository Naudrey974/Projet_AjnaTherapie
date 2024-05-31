<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Ajna Thérapie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
    <script src="script_Ajna.js" async></script>
    <link rel="stylesheet" href="style_Ajna.css">
    <!--<meta http-equiv="refresh" content="0;URL=formulaire.php"> -->
</head>
<body>

    <header> 
   
    <!--menu accueil-->
    <nav class="navbar">
    <a href="index.html" class="logo"><img src="ImagesAjna/LogoAjnaTherapie.svg" width="100vw" height="100vh"></a>
    <div class="listMenu">
        <ul>
            <li><a href="index.html"><img class="icon" src="ImagesAjna/🦆 icon _home_.svg"></a></li>
            <li><a href="#">Prestations</a></li>
            <li><a href="https://www.ajnatherapie.net/shop-1 " target="_blank">Boutique</a></li>
            <li><a href="#">Mon histoire</a></li>
            <li><a href="#">Evenements</a></li>
            <li><a href="formulaire.php"><img class="icon" src="ImagesAjna/🦆 icon _message question_.svg"></a></li>
            <li><a href="#"><img class="icon" src="ImagesAjna/🦆 icon _shopping cart_.svg"></a></li>
            <li><a href="connexion.php"><img class="icon" src="ImagesAjna/🦆 icon _profile circle_.svg"></a></li>
            
        </ul>
    </div>
    <!--menu burger sidebar-->
    <div id="mySidenav" class="sidenav">
        <a id="closeBtn" href="#" class="close">×</a>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Prestations</a></li>
            <li><a href="https://www.ajnatherapie.net/shop-1 " target="_blank">Boutique</a></li>
            <li><a href="#">Mon histoire</a></li>
            <li><a href="#">Evenement</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Panier</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        </ul>
    </div>
    <a href="#" id="openBtn">
        <img class="menuBurger" src="ImagesAjna/Menu burger.svg" alt="menu burger">             
    </a>
</nav>
</header>
<?php include "./executionForm.php"?>

<!--connexion-->
<div id="formulaire">  
  <div id="bgConnexion">
    <div id="connexion_utilisateur">
      <h2> CONNEXION</h2>
      <form id="formConnexion" action="" method="post">
        <div>
            <label for="mail_utilisateur">Votre adresse mail</label>
            <input type="email" id="email" name="mail_utilisateur" placeholder="monadresse@mail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div>
            <label for="password_utilisateur">Votre mot de passe</label>
            <input type="password" id="password" name="password_utilisateur" placeholder="votre mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" required>
        </div>
        <div>
            <button type="submit" name="submit1" id="refresh1">Se connecter</button>
        </div>
      </form> 
      <p class="msgError">
        <?php
            if(isset($_GET["error"])){
              switch ($_GET["error"]) {
                case 1:
                  echo "Informations de connexion invalides";
                    break;
                case 2:
                  echo "Veuillez remplir les champs du formulaire";
                    break;
                default:   
                  break;
                }
            }
        ?>
      </p>     
    </div>    
  </div>


              <!--formulaire d'inscription-->
  <div id="inscription_utilisateur">
    <h2>Pas encore de compte? Inscrivez-vous!</h2>
    <form action="" method="post">
      <div>
        <label for="nom_utilisateur">Votre nom</label>
        <input type="text" id="nom2" name="nom_utilisateur" placeholder="Dupond">
      </div>
      <div>
        <label for="prenom_utilisateur">Votre prénom</label>
        <input type="text" id="prenom2" name="prenom_utilisateur" placeholder="Julie">
      </div>
      <div>
        <label for="tel_utilisateur">Votre numéro de téléphone</label>
        <input type="tel" id="tel" name="tel_utilisateur" placeholder="+33" pattern="\d{10}" required>
      </div>
      <div>
        <label for="mail_utilisateur">Votre adresse mail</label>
        <input type="email" id="email2" name="mail_utilisateur" placeholder="monadresse@mail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required >
      </div>
      <div>
        <label for="password_utilisateur">Votre mot de passe</label>
        <input type="password" id="password2" name="password_utilisateur" placeholder="votre mot de passe">
      </div>
      <div>
        <label for="password_verification">Confirmer votre mot de passe</label>
        <input type="password" id="passwordVerif" name="password_verification" placeholder="votre mot de passe">
      </div>
      <div>
        <button type="submit" name="submit2" id="refresh2">Créer un compte</button>
      </div>
    </form>
  </div>
</div>        



<footer>
    <div class="listFooter">
      <div id="fb">
        <a class="groupIcon" href="https://www.facebook.com/ajnatherapierelationaide" target="_blank"><img class="iconFooter" src="ImagesAjna/🦆 icon _facebook_.svg"></a>
      </div>
      <div id="insta">
        <a class="groupIcon" href="#" target="_blank"><img class="iconFooter" src="ImagesAjna/🦆 icon _instagram_.svg"></a>
      </div>
      <div id="youtube">
        <a class="groupIcon" href="https://www.youtube.com/channel/UCQnNryqX1A_njq0lOpR-KbQ" target="_blank"><img class="iconFooter" src="ImagesAjna/🦆 icon _youtube_.svg"></a>
      </div>
      <div id="mentions">
        <a class="politic" href="#">Mentions légales</a>
      </div>
      <div id="conditions">
        <a class="politic" href="#">Conditions générales de vente</a>
      </div>
      <p>Copyright © 2023 AjnaThérapieRelationDAide</p>
  
    </div>
  </footer> 
  
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </html> 