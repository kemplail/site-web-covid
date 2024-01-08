
<!-- ----- début viewSelectionCentre -->
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
        if(!$centres) {
           echo("<h3>Aucun centre n'est disponible, nous sommes désolés.</h3>");
        } else {
    ?>
    
    <h3>Sélection d'un centre</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='rendezvousCreate'>
        <input type="hidden" name='patient_id' value='<?php echo ($patient_id); ?>'>
        <input type="hidden" name='select' value='<?php echo ($select); ?>'>
        
        <?php
            if($select == "rendezvousCreateDejaVaccine") {
                echo("<input type='hidden' name='vaccin_id' value='{$vaccin->getId()}'>");
                echo("<input type='hidden' name='nbDosesRecu' value='{$nbDosesRecu}'>");
            }       
        ?>
        
        <label for="centre_id">Centre : </label> <select class="form-control" id='centre_id' name='centre_id' style="width: 500px">
            <?php
                foreach ($centres as $element) {
                 echo ("<option value='{$element["centre_id"]}'>{$element["centre_id"]} - {$element["centre_label"]} - {$element["centre_adresse"]}</option>");
                }
            ?>
        </select>
      </div>
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    
    <?php
    
    }
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    
    <!-- ----- fin viewSelectionCentre -->    

    
    