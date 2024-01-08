s<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelRendezvous
 *
 * @author leoke
 */

require_once 'Model.php';

class ModelRendezvous {
    
    private $centre_id, $patient_id, $injection, $vaccin_id;
    
    public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id) && !is_null($patient_id) && !is_null($vaccin_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->patient_id = $patient_id;
            $this->injection = $injection;
        }
    }
    
    function setCentreId($centre_id) {
        $this->centre_id = $centre_id;
    }

    function setVaccinId($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    function setInjection($injection) {
        $this->injection = $injection;
    }
    
    function setPatientId($patient_id) {
        $this->patient_id = $patient_id;
    }
    
    function getCentreId() {
        return $this->centre_id;
    }
    
    function getVaccinId() {
        return $this->vaccin_id;
    }
    
    function getInjection() {
        return $this->injection;
    }
    
    function getPatientId() {
        return $this->patient_id;
    }
    
    public static function getAll() {
        
        $database = Model::getInstance();
         
        $query = "select centre.id as centre_id, vaccin.id as vaccin_id, patient.id as patient_id, centre.label as centre_label, vaccin.label as vaccin_label, patient.nom as patient_nom, patient.prenom as patient_prenom, rendezvous.injection from vaccin, centre, patient, rendezvous where rendezvous.vaccin_id = vaccin.id and rendezvous.centre_id = centre.id and rendezvous.patient_id = patient.id order by centre.id, vaccin.id, patient.id";
         
        $statement = $database->prepare($query);
        $statement->execute();
         
        $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
        $cols = array_keys($datas[0]);
         
        return array($cols,$datas);
    }
    
    public static function getOne($centre_id, $vaccin_id, $patient_id) {
      try {
       $database = Model::getInstance();
       $query = "select * from rendezvous where centre_id = :centre_id and vaccin_id = :vaccin_id and patient_id = :patient_id";
       $statement = $database->prepare($query);
       $statement->execute([
         'centre_id' => $centre_id,
         'vaccin_id' => $vaccin_id,
         'patient_id' => $patient_id
       ]);
       $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
       return $results;
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return NULL;
      }
    }
    
    public static function getRDVWithPatientID($patient_id) {
      try {
       $database = Model::getInstance();
       $query = "select patient.id as patient_id, centre.id as centre_id, rendezvous.injection as injection, vaccin.id as vaccin_id, vaccin.label as vaccin_label, centre.label as centre_label, centre.adresse as centre_adresse from rendezvous,patient,centre,vaccin where rendezvous.patient_id = :patient_id and rendezvous.patient_id = patient.id and rendezvous.centre_id = centre.id and rendezvous.vaccin_id = vaccin.id order by rendezvous.injection desc";
       $statement = $database->prepare($query);
       $statement->execute([
         'patient_id' => $patient_id
       ]);
       $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
      
        return $datas;
       
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return NULL;
      }
    }
    
    public static function getListeRDVParPatient($patient_id) {
            
        try {
       
         $database = Model::getInstance();
         
         $query = "select centre.label as centre_label, centre.adresse as centre_adresse, vaccin.label as vaccin_label, rendezvous.injection as numero_de_linjection from patient, rendezvous, vaccin, centre where rendezvous.centre_id = centre.id and rendezvous.vaccin_id = vaccin.id and rendezvous.patient_id = patient.id and patient.id = :patient_id";
         $statement = $database->prepare($query);
         $statement->execute([
            'patient_id' => $patient_id,
         ]);
         
         $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
         $cols = array_keys($datas[0]);
         
         return array($cols,$datas);
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
        
    }
    
    public static function getVaccinAvecLePlusQuantiteCentre($centre_id) {
        try {
            
         $database = Model::getInstance();
         
         $query = "select vaccin_id from stock where centre_id = :centre_id and quantite = (select max(quantite) from stock where centre_id = :centre_id)";
         $statement = $database->prepare($query);
         $statement->execute([
            'centre_id' => $centre_id,
         ]);
         
         $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
         
         return $datas;
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    public static function getListeRDVParCentre($centre_id) {
        try {
            
         $database = Model::getInstance();
         
         $query = "select patient.nom as nom_patient, patient.prenom as prenom_patient, vaccin.label as vaccin_label, rendezvous.injection as numero_de_linjection from patient, rendezvous, vaccin, centre where rendezvous.centre_id = centre.id and rendezvous.vaccin_id = vaccin.id and rendezvous.patient_id = patient.id and centre_id = :centre_id order by patient.id";
         $statement = $database->prepare($query);
         $statement->execute([
            'centre_id' => $centre_id,
         ]);
         
         $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
         $cols = array_keys($datas[0]);
         
         return array($cols,$datas);
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    public static function getNbRDVParCentreParPatient($patient_id) {
       try {
        $database = Model::getInstance();
        $query = "select count(*) as nb_rdv, centre.label as centre_label from centre,rendezvous,patient where rendezvous.patient_id = patient.id and patient.id = :patient_id and rendezvous.centre_id = centre.id group by centre.id order by nb_rdv";
        $statement = $database->prepare($query);
        $statement->execute([
          'patient_id' => $patient_id
        ]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return NULL;
      }
    }
    
    public static function insert($centre_id, $patient_id, $injection, $vaccin_id) {
      try {
       $database = Model::getInstance();
        // ajout d'un nouveau tuple;
       $query = "insert into rendezvous value (:centre_id, :patient_id, :injection, :vaccin_id)";
       $statement = $database->prepare($query);
       $statement->execute([
         'centre_id' => $centre_id,
         'patient_id' => $patient_id,
         'injection' => $injection,
         'vaccin_id' => $vaccin_id
       ]);
       
       return array($centre_id,$vaccin_id,$patient_id);
       
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return -1;
      }
    }
    
    public static function update($centre_id, $vaccin_id, $injection, $patient_id) {
      try {
          
       $database = Model::getInstance();
       $requete = 'UPDATE rendezvous SET injection = ? WHERE centre_id = ? AND vaccin_id = ? AND patient_id = ?';
       $statement = $database->prepare($requete);
       $statement->execute(array($injection, $centre_id, $vaccin_id, $patient_id));
       
       $results = $statement->rowCount();
       
       return $results;
       
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return -1;
      }
    }
    
}
