<!-- ----- debut Router -->
<?php

require ('../controller/ControllerGeneral.php');
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerRendezvous.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);
$action = $param["action"];
unset($param["action"]);

$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "vaccinReadAll" :
 case "vaccinCreate" :
 case "vaccinCreated" :
 case "vaccinReadId" :
 case "vaccinModify" :
 case "vaccinModified" :
 case "statistiquesVaccin" :
     ControllerVaccin::$action($args);
    break;
 case "centreReadAll" :
 case "centreCreate" :
 case "centreCreated" :
 case "classementCentreParNbInjections" :
     ControllerCentre::$action($args);
    break;
 case "patientReadAll" :
 case "patientCreate" :
 case "patientCreated" :
 case "patientReadId" :
 case "profilPatient" :
 case "mapPatient" :
     ControllerPatient::$action($args);
    break;
 case "stockReadAll" :
 case "stockCreate" :
 case "stockCreated" :
     ControllerStock::$action($args);
    break;
 case "readSituationVaccinale" :
 case "rendezvousCreate" :
 case "listeRendezvousCentre" :
     ControllerRendezvous::$action($args);
    break;
 case "AvisProjet" :
 case "DoccumentationInnovation1" :
 case "DoccumentationInnovation2" :
 case "DoccumentationInnovation3" :
     ControllerGeneral::$action();
    break;
 // Tache par défaut
 default:
  $action = "Accueil";
  ControllerGeneral::$action();
 break;

}
?>
<!-- ----- Fin Router1 -->
