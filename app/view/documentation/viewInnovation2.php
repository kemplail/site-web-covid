
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <h3>Innovation n°2 - Statistiques sur les vaccins</h3><br/>
    <p>
       <h4>Explication de l'innovation</h4>
       Cette innovation permet à l'utilisateur de consulter différentes statistiques sur les vaccins affichées à l'aide de graphs :
       la répartition des injections par vaccin ainsi que le nombre de doses possédés par les centres de vaccination de manière globale selon le vaccin.
       Cette innovation peut permettre d'avoir une vue d'ensemble sur le déroulement de la vaccination.
    </p>
    <p>
        <h4>Aspect technique</h4>
        Pour réaliser cette innovation, j'ai utilisé la librairie javascript Chart.js qui permet de générer en javascript des graphiques.
        Il donc fallu générer du code JS au sein de la vue en fonction de données PHP, avant d'appeler les fonctions de la librairie en JS
        pour afficher les graphiques.
        Concernant les données à afficher, il a fallu récupérer le nombre d'injections réalisées par vaccin à l'aide de la méthode getNbInjectionsParVaccin()
        du ModelVaccin, ainsi que le nombre de doses possédés par vaccin à l'aide de la méthode getNbDosesParVaccin() du ModelVaccin.
    </p>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->