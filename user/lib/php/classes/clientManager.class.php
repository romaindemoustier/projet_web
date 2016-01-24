<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clientManager
 *
 * @author Romain
 */
class clientManager extends client{
  private $_db;
    private $_contactArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function addClient(array $data) {
      
        $query="select addclient(:type,nom,:prenom,:adresse,ville,:cp,:pays,:numdetel) as retour" ;
       // "select addclient(:type,:nom_client,:pren_client,:adresse_client,:ville_client,:cp_client,:pays_client,:numdetel_client) as retour" ;
        try {
            $id=null;
            $statement = $this->_db->prepare($query);		
            $statement->bindValue(1, $data['type'], PDO::PARAM_INT);
            $statement->bindValue(2, $data['nom_client'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['pren_client'], PDO::PARAM_STR);
            $statement->bindValue(4, $data['adresse_client'], PDO::PARAM_STR);
            $statement->bindValue(5, $data['ville_client'], PDO::PARAM_STR);
            $statement->bindValue(6, $data['cp_client'], PDO::PARAM_INT);
            $statement->bindValue(7, $data['cp_client'], PDO::PARAM_STR);
            $statement->bindValue(8, $data['numdetel_client'], PDO::PARAM_STR);

            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } 
        catch(PDOException $e) {
            print "Echec de l'insertion : ".$e;
            $retour=0;
            return $retour;
        }   
    }
    
    private function checkEmpty($data) {
        
        return true;
    }
    
}
