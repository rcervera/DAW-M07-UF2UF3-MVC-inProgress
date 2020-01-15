<?php
	include_once 'Usuaris.php';
	error_reporting(E_ALL);
 	ini_set('display_errors', 1);

        $missatge ="";

    $usuaris = new Usuaris();
     
	if(isset($_GET['operacio']) && $_GET['operacio']=='formnou') {
            include_once 'formnew.php';
            exit;
        }

        if(isset($_GET['operacio']) && $_GET['operacio']=='actualitzar') {
            echo "el meu codi per actualitzar";
            exit;
        }
        
        if(isset($_GET['operacio']) && $_GET['operacio']=='esborrar') {
 		if(isset($_GET['codi'])) {
		   $codi=$_GET['codi'];	
	           if($usuaris->getUsuari($codi)) {	   	   
			   $res = $usuaris->esborrar($codi); 
			   if($res) $missatge = "Usuari eliminat";
			   else $missatge = "Usuari no esborrat!";
		   } else $missatge = "Usuari no existeix";
		}
       }
       
       
	if($_SERVER['REQUEST_METHOD']=='POST') {
		   $nom=$_POST['nom'];
		   $cognoms=$_POST['cognoms'];
		   $email =$_POST['email'];
		   $username=$_POST['username'];
		   $password=$_POST['password'];
		   $res = $usuaris->afegir($nom,$cognoms,$email,$username,$password);
		   if($res) $missatge = "alta correcta";
		   else $missatge = "Alta incorrecta";
	}

       
       

        $res = $usuaris->getAll();

        include_once 'llistat.php';        
      
?>


