<?php

class catalogueManager extends catalogue {
   
    private $_db;
    private $_prodArray=array();
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function getcata(){
        $query="select * from produit";
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
