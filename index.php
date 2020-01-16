<?php
	include_once 'Usuaris.php';
	error_reporting(E_ALL);
 	ini_set('display_errors', 1);

        $usuaris = new Usuaris();
        $missatge ="";

        if(isset($_GET['operacio'])) {
           $operacio = $_GET['operacio'];
           switch($operacio) {
		case 'formnou' :
			mostrarFormulariNou();
                break;
                
		case 'actualitzar' :
                        mostrarFormulariActualitzar($usuaris);
                break;

                case 'esborrar' :
                        esborrar($usuaris);
                break;

                case 'update' :
			update($usuaris);
                break;

                case 'alta' :
                        alta($usuaris);
                break;

		default: $missatge ="operacio incorrecta";

           }
        }

        $res = $usuaris->getAll();
        include_once 'llistat.php';   

        function mostrarFormulariNou() {
            include_once 'formnew.php';
            exit;
        }

        function mostrarFormulariActualitzar($usuaris)
        {
            global $missatge;
			if(isset($_GET['codi'])) {
			   $codi=$_GET['codi'];	
			   $usuari = $usuaris->getUsuari($codi);
			   if($usuari) {			
					include_once 'formupdate.php';
					exit;
				}
				else { 
					$missatge = "usuari no existeix";			
				}		  
            }            
        }
        
        function esborrar($usuaris) {
            global $missatge;
       		if(isset($_GET['codi'])) {
			   $codi=$_GET['codi'];	
	           if($usuaris->getUsuari($codi)) {	   	   
			   $res = $usuaris->esborrar($codi); 
			   if($res) $missatge = "Usuari eliminat";
			   else $missatge = "Usuari no esborrat!";
		   } else $missatge = "Usuari no existeix";
		}
        }

  
        function update($usuaris) {  
             global $missatge;     
			if($_SERVER['REQUEST_METHOD']=='POST') {			
			if(isset($_GET['codi'])) {
				$codi=$_GET['codi'];
				$nom=$_POST['nom'];
				$cognoms=$_POST['cognoms'];
				$email =$_POST['email'];
				$username=$_POST['username'];
					$res = $usuaris->actualitzar($codi,$nom,$cognoms,$email,$username);
				if($res) $missatge = "ActualitzaciÃ³ correcta";
				else $missatge = "ActualitzaciÃ³ incorrecta";		
			}
	    }
	}
     
        function alta($usuaris) 
        {
			global $missatge;
			if($_SERVER['REQUEST_METHOD']=='POST') {

					   // falta validar dades

			   $nom=$_POST['nom'];
			   $cognoms=$_POST['cognoms'];
			   $email =$_POST['email'];
			   $username=$_POST['username'];
			   $password=$_POST['password'];
			   $res = $usuaris->afegir($nom,$cognoms,$email,$username,$password);
			   if($res) $missatge = "alta correcta";
			   else $missatge = "Alta incorrecta";
			}
	}          
      
?>

