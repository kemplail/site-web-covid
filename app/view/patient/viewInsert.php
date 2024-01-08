
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

    <h3>Insertion d'un patient</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='patientCreated'>                                 
        <label for="nom">Nom :  </label><input type="text" name='nom' value=''>
        <label for="prenom">Prenom :  </label><input type="text" name='prenom' value=''>      
        <label for="adresse">Adresse :  </label><input type="text" name='adresse' value=''>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Ajouter le patient</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



