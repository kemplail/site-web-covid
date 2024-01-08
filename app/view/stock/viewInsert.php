
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?> 

    <h3>Attribution de vaccins pour un centre</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='stockCreated'>  
        <label for="centre_id">Sélectionnez un centre de vaccination : </label> <select class="form-control" id='centre_id' name='centre_id' style="width: 300px">
            <?php
            foreach ($centres as $element) {
             echo ("<option value='{$element->getId()}'>{$element->getId()} - {$element->getLabel()} - {$element->getAdresse()}</option>");
            }
            ?>
        </select>
        <?php
            foreach($vaccins as $element) {
                echo("<label for='".$element->getId()."'> Doses à ajouter du vaccin ".$element->getLabel()." : </label><br/>");
                echo("<input type='number' name='".$element->getId()."' value='1' min='0'><br/>");
            }
        ?>
      </div>
      
      <button class="btn btn-primary" type="submit">Ajouter les doses</button>
    </form>
      
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->