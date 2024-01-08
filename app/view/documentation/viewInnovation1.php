
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

    <h3>Innovation n°1 - Classement des centres par nombre d'injection / Liste des RDV pour chaque centre </h3><br/>
    <p>
        <h4>Explication de l'innovation</h4>
        Cette première innovation consiste à afficher le classement des centres par injections effectuées (et les infos associées), ce qui permet à l'utilisateur
        d'identifier les centres les plus efficaces (qui effectuent le plus de rendez-vous) et ainsi pouvoir les comparer entre eux.
        Pour chaque centre, l'utilisateur peut ensuite prendre connaissance de la liste des rendez-vous ayant été programmés dans le centre en question.
    </p>
    <p>
        <h4>Aspect technique</h4>
        Pour faire cela, il a fallu récupérer le nombre de rendez-vous par centre grâce à une requête SQL particulière, 
        réalisée depuis la méthode getCentresParNbInjections() du ModelCentre. Il a ensuite fallu générer et afficher dynamiquement
        un lien pour chaque centre qui amène à la liste des rendez-vous du centre en question. La liste des rendez-vous du centre et les infos associées sont ensuite
        récupérées grâce à une méthode getListeRDVParCentre() du ModelRendezvous avant d'être affichées.
    </p>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->