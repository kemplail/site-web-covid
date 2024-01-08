
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

    <h3>Sélection d'un vaccin</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='<?php echo ($target); ?>'>  
        <label for="id_vaccin">vaccin : </label> <select class="form-control" id='id_vaccin' name='id_vaccin' style="width: 300px">
            <?php
            foreach ($vaccins as $element) {
             echo ("<option value='{$element->getId()}'>{$element->getId()} - {$element->getLabel()}</option>");
            }
            ?>
        </select>
      </div>
      
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
      
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->