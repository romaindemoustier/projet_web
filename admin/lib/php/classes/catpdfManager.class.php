<?php
class catpdfManager extends catpdf {
    private $_db;
    public $_catpdfArray=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getCataloguepdf() {
        try
        {
            
	    $query="SELECT * FROM produit";
            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch(PDOException $e){
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){     
            try
            {
                $_catpdfArray[] = new catpdf($data);
            } 
            catch(PDOException $e)
            {
                
                print $e->getMessage();
            }            
        }
        return $_catpdfArray;        
    }
 }
?>
