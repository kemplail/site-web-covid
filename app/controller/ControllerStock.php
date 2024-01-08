<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerRecolte
 *
 * @author leoke
 */

require_once '../model/ModelStock.php';

class ControllerStock {
    
    public static function stockReadAll($args) {
        
        $results = ModelStock::getAll($args["target"]);
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        
        if (DEBUG)
         echo ("ControlleurStock : stockReadAll : vue = $vue");
        require ($vue);
    }
    
    public static function stockCreate() {
        
       $centres = ModelCentre::getAll();
       $vaccins = ModelVaccin::getAll();
        
       include 'config.php';
       $vue = $root . '/app/view/stock/viewInsert.php';
       require ($vue);
        
    }
    
    public static function stockCreated() {
        
        $centre_id = $_GET['centre_id'];
        unset($_GET['centre_id']);
        unset($_GET['action']);
        
        $centre = ModelCentre::getOne($centre_id)[0];
        
        $error = false;
        $action = 2;
        
        if (!empty($_GET)) {
            foreach($_GET as $vaccin_id => $quantite) {
                if(!empty($quantite) && $quantite != 0) {
                    $stock = ModelStock::getOne($centre_id, $vaccin_id);
                    if($stock) {
                        $results = ModelStock::update($centre_id, $vaccin_id, $stock[0]->getQuantite()+$quantite);
                    } else {
                        $results = ModelStock::insert($centre_id, $vaccin_id, $quantite);
                    }
                    
                    if($results == -1) {
                        $error = true;
                    }
                    
                    $action = 1;
                }
            }
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewInserted.php';
        require ($vue);
        
    }
    
}