
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

    <h3>Insérer un vaccin</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='vaccinCreated'>                                 
        <label for="label">label :  </label><input type="text" name='label' value=''>
        <label for="doses">doses :  </label><input min="1" type="number" step='any' name='doses' value='1'>                
      </div>
      <button class="btn btn-primary" type="submit">Ajouter le vaccin</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



