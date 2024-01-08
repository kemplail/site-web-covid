
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

    <h3>Innovation n°3 - Profil complet d'un utilisateur </h3><br/>
    <p>
        <h4>Explication de l'innovation</h4>
        Cette troisième innovation permet de consulter le profil en détail d'un utilisateur pour prendre connaissance de ses informations
        et de sa situation vaccinale en détail. La page de profil d'un utilisateur affiche tout d'abord ses informations d'identité, ainsi qu'une carte
        Google Map montrant où habite précisement le patient (en fonction de son adresse renseignée).
        Elle affiche ensuite la situation vaccinale en détail du patient : Si il est vacciné, et si c'est le cas, le vaccin qu'il a reçu,
        le nombre de doses qu'il a reçu / le nombre de doses nécessaires, son dernier rendez-vous effectué, les centres qu'il a le plus visité
        avec le nombre de rendez-vous associé, et un lien afin d'accéder à la liste des rendez-vous du patient.
    </p>
    <p>
        <h4>Aspect technique</h4>
        Pour afficher la carte Google Map sur la page, il a fallu utiliser l'API Maps Embed de Google qui permet ensuite de générer une balise
        iframe qui en fonction de l'adresse du patient, affiche sur la carte son lieu d'habitation automatiquement. 
        Il était nécessaire pour réaliser cette fonctionnalité de manipuler la liste de rendez-vous réalisés dans le patient (si vide le patient
        n'est pas vacciné), de récupérer les informations sur le vaccin associé à ces rendez-vous et de récupérer le nombre de rendez-vous par centre
        effectué par le patient grâce à la méthode getNbRDVParCentreParPatient() du ModelRendezvous.
        A la manière de la liste des rendez-vous d'un centre, il a fallu générer et afficher dynamiquement un lien qui amène à la liste des rendez-vous 
        du patient en question. La liste des rendez-vous du patient et les infos associées sont ensuite récupérées grâce à une méthode getListeRDVParPatient() du ModelRendezvous 
        avant d'être affichées.
    </p>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->