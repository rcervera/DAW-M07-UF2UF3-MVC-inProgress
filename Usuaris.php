<?php
class Usuaris {
    private $bd;
    private $usuari="alumne";
    private $password="alumne";

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
	 $sql = "select * from usuaris";	
    	 $ordre = $this->bd->prepare($sql);	
         $ordre->execute();   
         $res = $ordre->fetchAll(PDO::FETCH_ASSOC);
 
         return $res;
    }

  public function getUsuari($codi) {
	$sql="select * from usuaris where codi=:codi";  
        $ordre = $this->bd->prepare($sql);	 
        $ordre->bindValue(':codi',$codi);  
        $ordre->execute();   
        $res = $ordre->fetch(PDO::FETCH_ASSOC);
	
        return $res;
   }

    public function esborrar($codi) {
	 $sql ="delete from usuaris where codi=:codi";
         $ordre = $this->bd->prepare($sql);	 
         $ordre->bindValue(':codi',$codi);		   
	 $res = $ordre->execute();
         return $res;
    }

    public function afegir($nom,$cognoms,$email,$username,$password) {
 	$sql ="insert into usuaris(nom,cognoms,email,username,password) values 
			 (:nom,:cognoms,:email,:username,:password)";
	$ordre = $this->bd->prepare($sql);	 
	$ordre->bindValue(':nom',$nom);
	$ordre->bindValue(':cognoms',$cognoms);
	$ordre->bindValue(':email',$email);
	$ordre->bindValue(':username',$username);
	$ordre->bindValue(':password',md5($password));
	$res = $ordre->execute(); 
        return $res;

    }



}

?>
