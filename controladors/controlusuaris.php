<?php
class controlusuaris {
     private $usuaris;
     private $missatge;

     function __construct() {
		include_once 'models/Usuaris.php';		
		$this->usuaris = new Usuaris();
		$this->missatge ="";
		
	}

	public function index() {
		$res = $this->usuaris->getAll();
		$missatge =$this->missatge;
		
        include_once 'vistes/templates/header.php';  
        include_once 'vistes/usuaris/llistat.php';  
        include_once 'vistes/templates/footer.php';  
	}

	public function delete() {
           
       	if(isset($_GET['codi'])) {
		   $codi=$_GET['codi'];	
	           if($this->usuaris->get($codi)) {	   	   
			   $res = $this->usuaris->esborrar($codi); 
			   if($res) $this->missatge = "Usuari eliminat";
			   else $this->missatge = "Usuari no esborrat!";
		   } else $this->missatge = "Usuari no existeix";
		}
		$_SESSION['missatge'] = $this->missatge;
		header("Location: index.php?control=controlusuaris");
   }

     
	public function showformnew() {
			include_once 'vistes/templates/header.php';
            include_once 'vistes/usuaris/formnew.php';
            include_once 'vistes/templates/footer.php';
            
    }
 
	
    public function store() 
    {
		global $missatge;
		if($_SERVER['REQUEST_METHOD']=='POST') {

                   // falta validar dades

		   $nom=$_POST['nom'];
		   $cognoms=$_POST['cognoms'];
		   $email =$_POST['email'];
		   $username=$_POST['username'];
		   $password=$_POST['password'];
		   $res = $this->usuaris->afegir($nom,$cognoms,$email,$username,$password);
		   if($res) $this->missatge = "alta correcta";
		   else $this->missatge = "Alta incorrecta";
               }
		$_SESSION['missatge'] = $this->missatge;
		header("Location: index.php?control=controlusuaris");
		
	}    



     public function showformupdate()
     {
	    if(isset($_GET['codi'])) {
		   $codi=$_GET['codi'];	
		   $usuari = $this->usuaris->get($codi);
		   if($usuari) {		
			  include_once 'vistes/templates/header.php';   	
			  include_once 'vistes/usuaris/formupdate.php';   
			  include_once 'vistes/templates/footer.php';
		  }
		   else { 
			$this->missatge = "usuari no existeix";				
			  $_SESSION['missatge'] = $this->missatge;
			  
		      header("Location: index.php?control=controlusuaris");
		   }		  
          } else {
			$this->missatge = "Falta usuari";				
			$_SESSION['missatge'] = $this->missatge;
			header("Location: index.php?control=controlusuaris");
			

		}
		
      }

     
	
      public function update() {  
                  
	     if($_SERVER['REQUEST_METHOD']=='POST') {			
		if(isset($_GET['codi'])) {
			$codi=$_GET['codi'];
			$nom=$_POST['nom'];
			$cognoms=$_POST['cognoms'];
			$email =$_POST['email'];
			$username=$_POST['username'];
		        $res = $this->usuaris->actualitzar($codi,$nom,$cognoms,$email,$username);
		   	if($res) $this->missatge = "Actualització correcta";
		   	else $this->missatge = "Actualització incorrecta";		
		}
			$_SESSION['missatge'] = $this->missatge;
		   header("Location: index.php?control=controlusuaris");
	    }
	}


}      
      
?>