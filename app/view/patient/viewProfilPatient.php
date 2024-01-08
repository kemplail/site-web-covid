
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

    <h3>Profil du patient <?php echo($patient->getNom()) ?> <?php echo($patient->getPrenom()) ?></h3><br/>
    
    <div class="row">
        <div class="col-md-2"><img width="200" height="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png" /></div>
        <div class="col-md-10">
            <div class="col-md-4">
                <p>
                    
                    <h4>Informations d'identité</h4>
                    
                    <strong>Nom : </strong> <?php echo($patient->getNom()) ?> <br/>
                    <strong>Prénom : </strong> <?php echo($patient->getPrenom()) ?> <br/>
                    <strong>Adresse : </strong> <?php echo($patient->getAdresse()) ?> <br/><br/>

                </p>
                    
                <p>
                    <h4>Informations de vaccination</h4>
                    
                    <strong>Vacciné :</strong> 
                    
                    <?php
                        if($vacciné) {
                    ?>
                    
                    Oui <br/>
                    
                    <strong>Vaccin reçu :  </strong> <?php echo($vaccin_pris->getLabel()) ?> <br/>
                    <strong>Nombre de doses reçues : </strong> <?php echo($dernier_rdv["injection"]) ?> / <?php echo($vaccin_pris->getDoses()) ?> <br/><br/>
                    <strong>Dernier rendez-vous effectué : </strong>  <br/>
                    
                    <?php echo($dernier_rdv["centre_label"]) ?> - <?php echo($dernier_rdv["centre_adresse"]) ?> <br/><br/>
                    
                    <strong>Centres les plus visités : </strong> <br/>
                    
                    <ul>
                    <?php 
                        foreach($nb_rdv_par_centre as $element) {
                            echo("<li>".$element["centre_label"]." : ".$element["nb_rdv"]." rendez-vous</li>");
                        }
                    ?>
                    </ul>
                    
                    <br/>
                    <a href='router.php?action=listeRendezvousCentre&id_patient=<?php echo($patient->getId()) ?>'>Accéder à la liste des RDV du patient</a>
                    
                    <?php
                        } else {
                    ?>
                    
                    Non <br/>
                    
                    <?php } ?>
                
                </p>

            </div>
            <div class="col-md-6">
                
                <h4>Carte de la ville du patient</h4>
                <br/>
                
                <iframe
                    width="600"
                    height="450"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAwC3nCGy5atDJ3JokK4FKwprqa_RzmNO0
                      &q=<?php echo($patient->getAdresse()) ?>">
                </iframe>
                
            </div>
        </div>
    </div>
    <br/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->