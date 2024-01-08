s<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelRecolte
 *
 * @author leoke
 */

require_once 'Model.php';

class ModelStock {
    
    private $producteur_id, $vin_id, $quantite;
    
    public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id) && !is_null($vaccin_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->quantite = $quantite;
        }
    }
    
    function setCentreId($centre_id) {
        $this->centre_id = $centre_id;
    }

    function setVaccinId($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }
    
    function getCentreId() {
        return $this->centre_id;
    }
    
    function getVaccinId() {
        return $this->vaccin_id;
    }
    
    function getQuantite() {
        return $this->quantite;
    }
    
    public static function getAll($desc) {
        try {
            
         $database = Model::getInstance();
         
         if($desc == "listeCentresDoses") {
             $query = "select centre.id as centre_id, vaccin.id as vaccin_id, centre.label as centre_label, vaccin.label as vaccin_label, stock.quantite from vaccin, centre, stock where stock.vaccin_id = vaccin.id and stock.centre_id = centre.id order by centre.id, vaccin.id";
         } else {
             $query = "select centre.label as label, sum(quantite) as doses from stock, centre where centre.id = stock.centre_id GROUP BY centre.label order by sum(quantite) desc";
         }
         
         $statement = $database->prepare($query);
         $statement->execute();
         
         $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
         $cols = array_keys($datas[0]);
         
         return array($cols,$datas);
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    public static function getOne($centre_id, $vaccin_id) {
      try {
       $database = Model::getInstance();
       $query = "select * from stock where centre_id = :centre_id and vaccin_id = :vaccin_id";
       $statement = $database->prepare($query);
       $statement->execute([
         'centre_id' => $centre_id,
         'vaccin_id' => $vaccin_id
       ]);
       $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
       return $results;
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return NULL;
      }
    }
    
    public static function insert($centre_id, $vaccin_id, $quantite) {
      try {
       $database = Model::getInstance();
        // ajout d'un nouveau tuple;
       $query = "insert into stock value (:centre_id, :vaccin_id, :quantite)";
       $statement = $database->prepare($query);
       $statement->execute([
         'centre_id' => $centre_id,
         'vaccin_id' => $vaccin_id,
         'quantite' => $quantite
       ]);
       
       return $centre_id;
       
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return -1;
      }
    }
    
    public static function update($centre_id, $vaccin_id, $quantite) {
      try {
          
       $database = Model::getInstance();
       $requete = 'UPDATE stock SET quantite = ? WHERE centre_id = ? AND vaccin_id = ?';
       $statement = $database->prepare($requete);
       $statement->execute(array($quantite, $centre_id, $vaccin_id));
       
       $results = $statement->rowCount();
       
       return $results;
       
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return -1;
      }
    }
    
}
