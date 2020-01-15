<?php
	
	error_reporting(E_ALL);
 	ini_set('display_errors', 1);

    // Connexió amb la base de dades
    try {
	    
	        $bd = new PDO('mysql:host=localhost;dbname=projectBoard',"alumne", "alumne");  	   

	} catch (PDOException $e) {
	    print "Error: " . $e->getMessage() . "<br/>";
	    exit;
	}

    $missatge ="";

	if(isset($_GET['operacio']) && $_GET['operacio']=='formnou') {
	    echo('
          	<h3>Nou usuari</h3>
			<form method="POST" action="index.php">
			  Nom <input type="text" name="nom"><br>
			  Cognoms <input type="text" name="cognoms"><br>
			  Email <input type="text" name="email"><br>
			  Username <input type="text" name="username"><br>
			  Password <input type="text" name="password"><br>
			  <input type="submit" value="Nou">
			<form>
            ');
            exit;
        }

        if(isset($_GET['operacio']) && $_GET['operacio']=='actualitzar') {
            echo "Aquí aniria el meu codi per actualitzar.<br>";
            echo "S'ha de mostrar el formulari";
            echo "s'ha de recuperar informació del registre que es vol modificar.<br>";
            
            echo "Es complica una mica més el codi.. i es fa difícil de gestionar!!";
            exit;
        }
        
        
        if(isset($_GET['operacio']) && $_GET['operacio']=='esborrar') {
			if(isset($_GET['codi'])) {
			   $codi=$_GET['codi'];	
			   $sql ="delete from usuaris where codi=:codi";
			   $ordre = $bd->prepare($sql);	 
               $ordre->bindValue(':codi',$codi);		   
	           $res = $ordre->execute();
			   
			   if($res) $missatge = "Usuari eliminat";
			   else $missatge = "Usuari no esborrat!";
			   
			}
       }

  
        
       
	if($_SERVER['REQUEST_METHOD']=='POST') {
		   $nom=$_POST['nom'];
		   $cognoms=$_POST['cognoms'];
		   $email =$_POST['email'];
		   $username=$_POST['username'];
		   $password=$_POST['password'];
		   
		   // codi per instertar a la BD
		   $sql ="insert into usuaris(nom,cognoms,email,username,password) values 
			 (:nom,:cognoms,:email,:username,:password)";
			$ordre = $bd->prepare($sql);	 
			$ordre->bindValue(':nom',$nom);
			$ordre->bindValue(':cognoms',$cognoms);
			$ordre->bindValue(':email',$email);
			$ordre->bindValue(':username',$username);
			$ordre->bindValue(':password',md5($password));
			$res = $ordre->execute(); 
		   
		    if($res) $missatge = "alta correcta";
		    else $missatge = "Alta incorrecta";
	}
      
       

        $sql = "select * from usuaris";	
    	$ordre = $bd->prepare($sql);	
        $ordre->execute();   
        $res = $ordre->fetchAll(PDO::FETCH_ASSOC);

        echo "<a href='index.php?operacio=formnou'>Nou</a>";
	    echo "<table border=1>";
    	foreach($res as $usuari) {
		echo "<tr>"; 
		echo "<td>".$usuari['codi']."</td>";
		echo "<td>".$usuari['nom']."</td>";
		echo "<td>".$usuari['cognoms']."</td>";
		echo "<td>".$usuari['username']."</td>";
		echo "<td>".$usuari['email']."</td>";
		echo "<td>".$usuari['rol']."</td>";
		echo "<td>".$usuari['password']."</td>";
		echo "<td><a href='index.php?operacio=esborrar&codi=".$usuari['codi']."'>
                     Esborrar</td>";
		echo "<td><a href='index.php?operacio=actualitzar&codi=".$usuari['codi']."'>
                     Actualitzar</td>";
		echo "</tr>";
        }
        echo "</table>";

        echo $missatge;        
      
?>

