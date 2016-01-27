<?php

class catalogueManager extends catalogue {
   
    private $_db;
    private $_prodArray=array();
   
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
      public function upCata (array $data) {
         
      $query="select upcata (:id,:prix) as retour" ;
        try {
            $id=null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1,$data['id'], PDO::PARAM_INT);
            $statement->bindValue(2,$data['prix'], PDO::PARAM_INT);
         
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
    
    
    public function getcata(){
        $query="select * from produit order by idprod";
        $resultset = $this->_db->prepare($query);
        //$resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_prodArray[] = new catalogue($data);
        }
        return $_prodArray;
    }
}



?>
