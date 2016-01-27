<?php

class clientReadManager extends clientRead {
   
    private $_db;
    private $_CLiArray=array();
   
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function supprimCli(array $data){
        
            $query="select delcli (:id) as retour" ;
        try {
            $id=null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1,$data['id_cli'], PDO::PARAM_INT);
           
         
            $statement->execute();
       
            $retour = $statement->fetchColumn(0);
        
            return $retour;
          
        } 
        catch(PDOException $e) {
            print "Echec de la suppression : ".$e;
            $retour=0;
            return $retour;
        }   
        
    }
    
        
     
    
    public function getcli(){
        $query="select * from client order by idcli";
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
