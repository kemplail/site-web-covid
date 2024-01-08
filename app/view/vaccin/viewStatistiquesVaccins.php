
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentHeaderScriptChartJS.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?> 

    <h3>Statistiques sur les vaccins</h3><br/>
    
    <div class="row">
        <div class="col-md-6">
            <h4>Répartition des injections par vaccin</h4>
            <canvas id="nb_injections_par_vaccin" width="400" height="400"></canvas>
        </div>
        <div class="col-md-6">
            <h4>Nombre de doses possédés par les centres par vaccin</h4>
            <canvas id="nb_doses_par_vaccin" width="400" height="400"></canvas>
        </div>
    </div>
    
    <script>

        var myChart1 = new Chart(
            document.getElementById('nb_injections_par_vaccin'),
            {
                type: 'pie',
                data: {
                    labels: [<?php 
                        foreach($nb_injections_par_vaccin as $element) {
                            echo("'".$element["vaccin_label"]."'".",");
                        }
                    ?>],
                    datasets: [{
                      label: 'Répartition des injections par vaccin',
                      backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(75, 192, 192)',
                          'rgb(255, 205, 86)',
                          'rgb(201, 203, 207)',
                          'rgb(54, 162, 235)'
                       ],
                      data: [<?php 
                          foreach($nb_injections_par_vaccin as $element) {
                              echo($element["nb_injections"].",");
                          }
                      ?>],
                    }]  
                },
                options: {
                    responsive: false
                }
            }
        );

        var myChart2 = new Chart(
            document.getElementById('nb_doses_par_vaccin'),
            {
                type: 'bar',
                data: {
                    labels: [<?php 
                        foreach($nb_doses_par_vaccin as $element) {
                            echo("'".$element["vaccin_label"]."'".",");
                        }
                    ?>],
                    datasets: [{
                      label: 'Nombre de doses',
                      backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(75, 192, 192)',
                          'rgb(255, 205, 86)',
                          'rgb(201, 203, 207)',
                          'rgb(54, 162, 235)'
                       ],
                      data: [<?php 
                          foreach($nb_doses_par_vaccin as $element) {
                              echo($element["nb_doses"].",");
                          }
                      ?>],
                    }]  
                },
                options: {
                    responsive: false
                }
            }
        );
        
    </script>

    
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



