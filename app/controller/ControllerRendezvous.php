
<!-- ----- debut ControllerRendezvous -->
<?php
require_once '../model/ModelRendezvous.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelCentre.php';

class ControllerRendezvous {

    public static function readSituationVaccinale($args) {
        
        $patient_id = $_GET['id'];
        $rdvpatient = ModelRendezvous::getRDVWithPatientID($patient_id);
        $nbDosesRecu = count($rdvpatient);
        
        include 'config.php';
        
        //Si le patient a déjà été vacciné
        if($rdvpatient && count($nbDosesRecu != 0)) {
            
            $vaccin = ModelVaccin::getOne($rdvpatient[0]["vaccin_id"]);
                
            if($vaccin && $nbDosesRecu != $vaccin[0]->getDoses()) {

                $vaccin = $vaccin[0];
                $centres = ModelCentre::getCentresAyantVaccin($vaccin->getId());
                
                $select = "rendezvousCreateDejaVaccine";
                $vue = $root . '/app/view/rendezvous/viewSelectionCentre.php';
                
            } else {

                $vue = $root . '/app/view/rendezvous/viewVaccinRecu.php';
                    
            }
            
        } else {
            
            $centres = ModelCentre::getCentresAyantAuMoinsUneDose();
            
            $select = "rendezvousCreateNonVaccine";
            $vue = $root . '/app/view/rendezvous/viewSelectionCentre.php';
            
        }
        
        if (DEBUG)
         echo ("ControllerRendezvous : readSituationVaccinale : vue = $vue");
        require ($vue);
        
    }
    
    public static function rendezvousCreate($args) {
        
        $centre_id = $_GET['centre_id'];
        $patient_id = $_GET['patient_id'];
        
        if($_GET['select'] == "rendezvousCreateNonVaccine") {

            $vaccins = ModelRendezvous::getVaccinAvecLePlusQuantiteCentre($centre_id);

            if(sizeof($vaccins) > 1) {
                $vaccin = $vaccins[rand(0, sizeof($vaccins)-1)];
            } else {
                $vaccin = $vaccins[0];
            }
            
            $vaccin_id = $vaccin["vaccin_id"];
            $injection = 1;
            
        } else {
            
            $vaccin_id = $_GET['vaccin_id'];
            $injection = $_GET['nbDosesRecu']+1;
            
        }
        
        $rendezvous = ModelRendezvous::insert($centre_id, $patient_id, $injection, $vaccin_id);
        $stockactuel = ModelStock::getOne($centre_id, $vaccin_id)[0]->getQuantite();
        $majstock = ModelStock::update($centre_id,$vaccin_id,$stockactuel-1);
        
        //On vérifie si le rdv et l'update des stocks s'est fait
        if($rendezvous != -1 && $majstock != -1) {
            
            $rdvajoute = ModelRendezvous::getRDVWithPatientID($patient_id)[0];
            
            $error = false;
            
        } else {
            
            $error = true;
            
        }
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewCreated.php';
        require ($vue);
        
    }
    
    public static function listeRendezvousCentre($args) {
        
        if(isset($_GET['id_centre'])) {
            
            $listerendezvous = ModelRendezvous::getListeRDVParCentre($_GET['id_centre']);
            $centre = ModelCentre::getOne($_GET['id_centre'])[0];
            $title = "centre ".$centre->getLabel();
            
        } else if (isset($_GET['id_patient'])) {
            
            $listerendezvous = ModelRendezvous::getListeRDVParPatient($_GET['id_patient']);
            $patient = ModelPatient::getOne($_GET['id_patient'])[0];
            $title = "patient ".$patient->getNom()." ".$patient->getPrenom();
            
        }
            
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewListeRDV.php';
        require ($vue);
           
        
    }
 
}
?>
<!-- ----- fin ControllerRendezvous -->


