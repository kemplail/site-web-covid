
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      //id_vaccin
    ?>
      
    <h3>Modifier un vaccin</h3>
    
    <strong>Id : </strong><?php echo ($vaccin->getId()); ?> <br/>
    <strong>Label : </strong><?php echo ($vaccin->getLabel()); ?>
    <form role="form" method='get' action='router.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='vaccinModified'>
            <input type="hidden" name='id_vaccin' value='<?php echo ($vaccin->getId()); ?>'> 
            <input type="hidden" name='label' value='<?php echo ($vaccin->getLabel()); ?>'> 
            <label for="doses">Doses :  </label><input type="number" step='any' name='doses' min="1" value='<?php echo ($vaccin->getDoses()); ?>'>                
        </div>
        <button class="btn btn-primary" type="submit">Modifier le vaccin</button>
    </form> 

  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



