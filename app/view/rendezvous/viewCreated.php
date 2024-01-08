
<!-- ----- début viewCreated -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if (!$error) {
        
     echo ("<h3>Le rendez-vous a bien été pris en compte : Vous allez recevoir votre dose n°{$rdvajoute["injection"]} du vaccin {$rdvajoute["vaccin_label"]} dans le centre {$rdvajoute["centre_label"]} - adresse : {$rdvajoute["centre_adresse"]} </h3>");  
     
    } else {
     echo ("<h3>Problème dans la prise en compte du rendez-vous. </h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewCreated -->    

    
    