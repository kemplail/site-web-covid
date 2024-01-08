<?php

class ControllerGeneral {
    
    // --- page d'acceuil
    public static function Accueil() {
     include 'config.php';
     $vue = $root . '/app/view/viewAccueil.php';
     if (DEBUG)
      echo ("ControllerGeneral : Accueil : vue = $vue");
     require ($vue);
    }
    
    public static function AvisProjet() {
      include 'config.php';
      $vue = $root . '/app/view/documentation/viewAvisProjet.php';
      require ($vue);
    }
    
    public static function DoccumentationInnovation1() {
        
     include 'config.php';
     $vue = $root . '/app/view/documentation/viewInnovation1.php';
     require ($vue);
     
    }
    
    public static function DoccumentationInnovation2() {
        
     include 'config.php';
     $vue = $root . '/app/view/documentation/viewInnovation2.php';
     require ($vue);
     
    }
    
    public static function DoccumentationInnovation3() {
        
     include 'config.php';
     $vue = $root . '/app/view/documentation/viewInnovation3.php';
     require ($vue);
     
    }
    
}