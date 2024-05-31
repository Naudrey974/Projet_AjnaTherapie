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


        <?php
            //démarrage d'une session utilisateur
            session_start();
            if(isset($_SESSION["activated"])){
              //htmlspecialchars sécurise l'affichage des noms utilisateurs
                $nom_utilisateur =  htmlspecialchars($_SESSION["nom_utilisateur"]);
                $prenom_utilisateur =  htmlspecialchars($_SESSION["prenom_utilisateur"]);
            }else{
              header("location:./connexion.php");
            }
        ?>
    <div id="user-info">
      <p>Bonjour <?php echo $prenom_utilisateur . ' ' . $nom_utilisateur; ?> !</p></p>
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