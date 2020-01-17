<?php
class Model {

    protected $bd;
    protected $usuari="alumne";
    protected $password="alumne";
    protected $taula;

    function __construct() {
		 
		try {
			
			$this->bd = new PDO('mysql:host=localhost;dbname=projectBoard', 
					 $this->usuari, $this->password);  	   

		} catch (PDOException $e) {
			print "Error: " . $e->getMessage() . "<br/>";
			die();
		}

    }

    public function getAll() {
	 $sql = "select * from ".$this->taula;	
         
    	 $ordre = $this->bd->prepare($sql);	
         $ordre->execute();   
         $res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
         return $res;
    }

    public function get($codi) {
	    $sql="select * from ".$this->taula." where codi=:codi";  
        $ordre = $this->bd->prepare($sql);	 
        $ordre->bindValue(':codi',$codi);  
        $ordre->execute();   
        $res = $ordre->fetch(PDO::FETCH_ASSOC);
	
        return $res;
   }

    public function esborrar($codi) {
	 $sql ="delete from ".$this->taula." where codi=:codi";
         $ordre = $this->bd->prepare($sql);	 
         $ordre->bindValue(':codi',$codi);		   
	 $res = $ordre->execute();
         return $res;
    }

}

?>
