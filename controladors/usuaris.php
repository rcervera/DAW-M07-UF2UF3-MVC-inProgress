<?php
include_once 'models/Usuaris';
class controlusuaris {
     private $usuaris;
     // private $missatge;

     function __construct() {

		//$this->usuaris = new Usuaris();
		// $this->missatge = "";
	}

	public function index() {
		$res = $this->usuaris->getAll();
           include_once 'vistes/usuaris/llistat.php';   
	}
        

     

}      
      
?>
