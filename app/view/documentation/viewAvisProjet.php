
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

    <h3>Avis sur le projet </h3>
    <br/>
    <p>
    <h4>Mon avis : </h4>
        Ce projet fut très instructif puisqu'il m'a permis de réellement prendre en main la structure MVC et appliquer l'ensemble des connaissances acquises au travers des TP et cours que nous avons
        eu durant le semestre. Cette UE a globalement permet d'acquérir des connaissances assez dévelopées en PHP, tout en balayant un nombre intéressant de technos web (HTML,CSS,PHP) toutes nécessaires à la réalisation d'un site web un minimum complet. 
        C'est peut être dommage de ne pas avoir vu un petit peu de JS pour créer du contenu dynamique et intéractif côté client. J'ai tout de même pu utiliser un peu de Javascript à travers mes innovations.
        Les connaissances apprises permettront surement de s'adapter assez vite en entreprise lorsqu'il s'agira d'utiliser un Framework web MVC.
    </p>
    <br/>
    <p>
        <h4>Propositions d'amélioration / évolution :</h4>
        
        A travers la réalisation du projet, j'ai pu identifier plusieurs améliorations qui pourraient être apportées pour réaliser une version plus avancée : <br/><br/>
        <strong>Correction de bug</strong> : Forcer l'utilisateur à devoir renseigner tous les champs des formulairse lorsqu'il ajoute un centre, un patient ou un vaccin
        afin d'avoir des données complètes et cohérentes. <br/>
        <strong>Proposition d'amélioration</strong> : Ajouter une fonctionnalité de modification et suppression pour toutes les entités (centres, patients...) pour permettre à l'utilisateur
        de contrôler totalement les données du site web. <br/>
        <strong>Proposition d'amélioration</strong> : Ajouter un système d'authentification (via login et mot de passe par exemple) pour éviter que n'importe qui
        puisse avoir accès aux fonctionnalités du site et donc puisse modifier les éléments de la base. <br/>
        <strong>Proposition d'amélioration</strong> : Rendre le site web davantage dynamique avec l'utilisation de JS.<br/><br/>
        
        <strong>Evolution du site : </strong> Pour faire évoluer le site, on pourrait faire évoluer les rendez-vous et développer un espace personnel pour le patient qui lui permettrait de prendre rendez-vous en 
        choisissant un créneau de rendez-vous selon des créneaux disponibles et lui permettre d'accéder à ses rendez-vous ou d'annuler un rendez-vous. On pourrait ensuite accéder au planning
        de rendez-vous de chaque centre.
          
    </p>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->