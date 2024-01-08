
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <h3>Sélection d'un patient</h3>
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='<?php echo ($target); ?>'>
        <label for="id">id : </label> <select class="form-control" id='id' name='id' style="width: 300px">
            <?php
            foreach ($results as $element) {
             echo ("<option value='{$element->getId()}'>{$element->getId()} - {$element->getNom()} {$element->getPrenom()}</option>");
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewId -->