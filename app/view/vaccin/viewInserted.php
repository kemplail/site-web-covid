
<!-- ----- début viewInserted -->
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
    if ($results != -1) {
     echo ("<h3>Le nouveau vaccin a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>ID = " . $results . "</li>");
     echo ("<li>Label = " . $_GET['label'] . "</li>");
     echo ("<li>Doses = " . $_GET['doses'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du Vaccin</h3>");
     echo ("label = " . $_GET['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    