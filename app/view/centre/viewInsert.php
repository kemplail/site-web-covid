
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

    <h3>Ajouter un centre</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='centreCreated'>                                 
        <label for="label">Label :  </label><input type="text" name='label' value=''>
        <label for="adresse">Adresse :  </label><input type="text" name='adresse' value=''>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Ajouter un centre</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



