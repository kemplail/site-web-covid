
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
    
    if($action == 1) {
        if (!$error) {
            echo ("<h3>Les doses du centre ".$centre->getLabel()." (id = ".$centre->getId().") ont bien été mises à jour. </h3>");
        } else {
            echo ("<h3>Une erreur est survenue dans la mise à jour des doses du centre ".$centre->getLabel()." (id = ".$centre->getId().")</h3>");
        }
    } else if($action == 2) {
        echo ("<h3>Les doses du centre ".$centre->getLabel()." (id = ".$centre->getId().") n'ont pas été mises à jour car vous n'avez pas entré de doses ou uniquement des quantités égales à 0.</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    
    <!-- ----- fin viewInserted -->    

    
    