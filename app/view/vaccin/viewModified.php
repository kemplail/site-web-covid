
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
     echo ("<h3>Le vaccin a été modifié </h3>");
     echo("<ul>");
     echo ("<li>id = " . $_GET['id_vaccin'] . "</li>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>doses = " . $_GET['doses'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'update du Vaccin</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    