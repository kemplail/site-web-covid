
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      
      if(isset($listerendezvous)) {
          
          if(!empty($listerendezvous[1])) {
              
      ?>

    <h3>Liste des rendez-vous du <?php echo($title)?></h3>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
            <?php
                foreach($listerendezvous[0] as $column) {
                    echo("<th scope = 'col'>{$column}</th>");
                }
            ?>
        </tr>
      </thead>
      <tbody>
          <?php
                foreach($listerendezvous[1] as $data) {
                        printf("<tr>");
                        foreach($data as $element) {
                            printf("<td>%s</td>",$element);
                        }
                        printf("</tr>");
                }
          ?>
      </tbody>
    </table>
  </div>
    
  <?php 
  
            } else {
                echo("<h3>Aucun rendez-vous n'a été trouvé</h3>");
            }
            
      } else {
          echo("<h3>Une erreur est survenue</h3>");
      }
      
        include $root . '/app/view/fragment/fragmentFooter.html'; 
  
  ?>

  <!-- ----- fin viewAll -->