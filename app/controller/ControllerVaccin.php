
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {

 // --- Liste des vaccins
 public static function vaccinReadAll() {
     
  $vaccins = ModelVaccin::getAll();
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  
  if (DEBUG)
   echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
  
  require ($vue);
  
 }
 
 // Affiche le formulaire de creation d'un vaccin
 public static function vaccinCreate() {
  // ----- Construction chemin de la vue
  
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInsert.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour récupérer les informations d'un nouveau vaccin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function vaccinCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelVaccin::insert(
      htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInserted.php';
  require ($vue);
 }
 
  public static function vaccinReadId($args) {
      
  $vaccins = ModelVaccin::getAll();
  $target = $args['target'];
  
  if(DEBUG) echo("ControllerVaccin:vaccinReadId : target = $target</br>");

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewId.php';
  require ($vue);
  
 }
 
 // Affiche le formulaire de modification d'un vaccin
 public static function vaccinModify() {
  // ----- Construction chemin de la vue
  
  $id_vaccin = $_GET['id_vaccin'];
  $vaccin = ModelVaccin::getOne($id_vaccin)[0];
     
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewModify.php';
  require ($vue);
 }
 
public static function vaccinModified() {
  // ajouter une validation des informations du formulaire
  $results = ModelVaccin::update(
      htmlspecialchars($_GET['id_vaccin']), htmlspecialchars($_GET['doses'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  
  $vue = $root . '/app/view/vaccin/viewModified.php';
  require ($vue);
}

public static function statistiquesVaccin() {
    
    $nb_injections_par_vaccin = ModelVaccin::getNbInjectionsParVaccin();
    $nb_doses_par_vaccin = ModelVaccin::getNbDosesParVaccin();
    
    // ----- Construction chemin de la vue
    include 'config.php';

    $vue = $root . '/app/view/vaccin/viewStatistiquesVaccins.php';
    require ($vue);
    
}
 
}
?>
<!-- ----- fin ControllerVaccin -->


