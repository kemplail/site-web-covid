
<!-- ----- debut ModelCentre -->

<?php
require_once 'Model.php';

class ModelCentre {
 private $id, $label, $adresse;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $adresse = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->adresse = $adresse;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setLabel($label) {
  $this->label = $label;
 }

 function setAdresse($adresse) {
  $this->adresse = $adresse;
 }

 function getId() {
  return $this->id;
 }

 function getLabel() {
  return $this->label;
 }

 function getAdresse() {
  return $this->adresse;
 }
 
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from centre where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function insert($label, $adresse) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from centre";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into centre value (:id, :label, :adresse)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'adresse' => $adresse
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function delete($id) {
  
  try {
       
    $database = Model::getInstance();
    $query = "DELETE FROM centre where id = :id";
    $statement = $database->prepare($query);
    $statement->execute([
        'id' => $id
    ]);
        
    return 1;
        
  } catch (PDOException $e) {
      
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
   
  }
 }

    public static function getCentresAyantVaccin($vaccin_id) {
        try {
            
         $database = Model::getInstance();
         
         $query = "select centre.id as centre_id, centre.label as centre_label, centre.adresse as centre_adresse from centre,stock where centre.id = stock.centre_id and stock.vaccin_id = :vaccin_id and stock.quantite > 0";
         $statement = $database->prepare($query);
         $statement->execute([
            'vaccin_id' => $vaccin_id,
         ]);
         
         $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
         
         return $datas;
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
    public static function getCentresAyantAuMoinsUneDose() {
        try {
            
         $database = Model::getInstance();
         
         $query = "select DISTINCT centre.id as centre_id, centre.label as centre_label, centre.adresse as centre_adresse from centre,stock where centre.id = stock.centre_id and stock.quantite > 0";
         $statement = $database->prepare($query);
         $statement->execute([
            'vaccin_id' => $vaccin_id,
         ]);
         
         $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
         
         return $datas;
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }
    
        public static function getCentresParNbInjections() {
        try {
            
         $database = Model::getInstance();
         
         $query = "select centre.id as centre_id, centre.label as centre_label, count(*) as injections from centre, rendezvous where centre.id = rendezvous.centre_id group by centre.id order by injections desc";
         $statement = $database->prepare($query);
         $statement->execute();
         
         $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
         
         return $datas;
         
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
    }

}
    
?>
<!-- ----- fin ModelCentre -->
