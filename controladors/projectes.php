<?php
	include_once 'models/Projectes.php';
	error_reporting(E_ALL);
 	ini_set('display_errors', 1);

        $projectes = new Projectes();
        $missatge ="";

        if(isset($_GET['operacio'])) {
           $operacio = $_GET['operacio'];
           switch($operacio) {
		case 'formnou' :
			mostrarFormulariNou();
                break;
                
		case 'actualitzar' :
                        mostrarFormulariActualitzar($projectes);
                break;

                case 'esborrar' :
                        esborrar($projectes);
                break;

                case 'update' :
			update($projectes);
                break;

                case 'alta' :
                        alta($projectes);
                break;

		default: $missatge ="operacio incorrecta";

           }
        }

        $res = $projectes->getAll();
        include_once 'vistes/projectes/llistat.php';   

        function mostrarFormulariNou() {
            include_once 'vistes/projectes/formnew.php';
            exit;
        }

        function mostrarFormulariActualitzar($projectes)
        {
             global $missatge;
	    if(isset($_GET['codi'])) {
		   $codi=$_GET['codi'];	
		   $projecte = $projectes->get($codi);
		   if($projecte) {			
			include_once 'vistes/projectes/formupdate.php';
            		exit;

		   }
		   else { 
			$missatge = "projecte no existeix";			
		   }		  
            }            
        }
        
        function esborrar($projectes) {
            global $missatge;
       		if(isset($_GET['codi'])) {
		   $codi=$_GET['codi'];	
	           if($projectes->get($codi)) {	   	   
			   $res = $projectes->esborrar($codi); 
			   if($res) $missatge = "Projecte eliminat";
			   else $missatge = "Projecte no esborrat!";
		   } else $missatge = "Projecte no existeix";
		}
        }

  
        function update($projectes) {  
             global $missatge;     
	     if($_SERVER['REQUEST_METHOD']=='POST') {			
		if(isset($_GET['codi'])) {
			$codi=$_GET['codi'];
			$nom=$_POST['nom'];
			$descripcio=$_POST['descripcio'];
			$dataInici =$_POST['dataInici'];
			$dataFi=$_POST['dataFi'];
			$estat=$_POST['estat'];
		        $res = $projectes->actualitzar($codi,$nom,$descripcio,$dataInici,$dataFi,$estat) ;
		   	if($res) $missatge = "Actualització correcta";
		   	else $missatge = "Actualització incorrecta";		
		}
	    }
	}
     
        function alta($projectes) 
        {
		global $missatge;
		if($_SERVER['REQUEST_METHOD']=='POST') {

                   // falta validar dades

		   $nom=$_POST['nom'];
		   $descripcio=$_POST['descripcio'];
		   $dataInici =$_POST['dataInici'];
		   $dataFi=$_POST['dataFi'];
		   $estat=$_POST['estat'];

		   $res = $projectes->afegir($nom,$descripcio,$dataInici,$dataFi,$estat) ;
		   if($res) $missatge = "alta correcta";
		   else $missatge = "Alta incorrecta";
               }
	}          
      
?>
