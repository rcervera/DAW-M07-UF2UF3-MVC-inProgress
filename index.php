<?php
	 
     define("HOME", "");

	if(isset($_GET['control'])) {	
	  $control = $_GET['control'];
	  if(file_exists('controladors/'.$control.'.php')) {
		 include_once 'controladors/'.$control.'.php';
		 exit;
	  }
     }
	
     include_once 'controladors/default.php';

     


?>
