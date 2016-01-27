<?php

class clientManager extends client{
  private $_db;
    private $_clientArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function addClient(array $data) {
      
        $query="select addclient (:nom,:prenom,:adresse,:ville,:cp,:pays,:numdetel) as retour" ;
       // "select addclient(:type,:nom_client,:pren_client,:adresse_client,:ville_client,:cp_client,:pays_client,:numdetel_client) as retour" ;
        try {
            $id=null;
           
      
            $statement = $this->_db->prepare($query);
      
            //$statement->bindValue(1, $data['type'], PDO::PARAM_INT);
            $statement->bindValue(1, $data['nom'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['prenom'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['adresse'], PDO::PARAM_STR);
            $statement->bindValue(4, $data['ville'], PDO::PARAM_STR);
            $statement->bindValue(5, $data['cp'], PDO::PARAM_INT);
            $statement->bindValue(6, $data['pays'], PDO::PARAM_STR);
            $statement->bindValue(7, $data['numdetel'], PDO::PARAM_STR);
            
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
