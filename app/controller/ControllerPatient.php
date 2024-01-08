
<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {

 // --- Liste des vaccins
 public static function patientReadAll() {
  $results = ModelPatient::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAll.php';
  if (DEBUG)
   echo ("ControllerPatient : patientReadAll : vue = $vue");
  require ($vue);
 }
 
 // Affiche le formulaire de creation d'un centre
 public static function patientCreate() {
  // ----- Construction chemin de la vue
  
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInsert.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour récupérer les informations d'un nouveau centre.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function patientCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelPatient::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInserted.php';
  require ($vue);
 }
 
  // Affiche un formulaire pour sélectionner un id qui existe
 public static function patientReadId($args) {
  $results = ModelPatient::getAll();
  
  $target = $args['target'];
  if(DEBUG) echo("ControllerPatient:patientReadId : target = $target</br>");

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewId.php';
  require ($vue);
 }
 
 public static function profilPatient($args) {
     
  $patient = ModelPatient::getOne($_GET['id'])[0];
  $listerdvpatient = ModelRendezvous::getRDVWithPatientID($patient->getId());
     
  if($listerdvpatient) {
      
      $vacciné = true;
      $dernier_rdv = $listerdvpatient[0];
      $vaccin_pris = ModelVaccin::getOne($listerdvpatient[0]["vaccin_id"])[0];
      $nb_rdv_par_centre = ModelRendezvous::getNbRDVParCentreParPatient($_GET['id']);
      
  } else {
      
      $vacciné = false;
      
  }
  
  include 'config.php';
  $vue = $root . '/app/view/patient/viewProfilPatient.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerPatient -->


