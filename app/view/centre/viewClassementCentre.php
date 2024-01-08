
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

    <h3>Classement des centres par injections</h3>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Classement</th>
          <th scope = "col">Label</th>
          <th scope = "col">Injections réalisées</th>
          <th scope = "col">Accéder à la liste des rendez-vous</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vaccins est dans une variable $results        
          
          $classement = 1;
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%s</d></tr>", $classement, $element["centre_label"], 
             $element["injections"], "<a href='router.php?action=listeRendezvousCentre&id_centre={$element["centre_id"]}'>Liste des rendez-vous</a>");
             $classement++;
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->