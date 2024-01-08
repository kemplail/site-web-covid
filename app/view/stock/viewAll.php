
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
     
    <h3>Liste des stocks de vaccins</h3>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
            <?php
                if (isset($results)) {
                    foreach($results[0] as $column) {
                        echo("<th scope = 'col'>{$column}</th>");
                    }
                }
            ?>
        </tr>
      </thead>
      <tbody>
          <?php
            if (isset($results)) {
                    foreach($results[1] as $data) {
                        printf("<tr>");
                        foreach($data as $element) {
                            printf("<td>%s</td>",$element);
                        }
                        printf("</tr>");
                    }
                }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  