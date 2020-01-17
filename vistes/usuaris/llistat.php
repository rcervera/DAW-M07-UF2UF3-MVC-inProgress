<?php
        echo "<a href='usuaris.php?operacio=formnou'>Nou</a>";
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
		echo "<td><a href='usuaris.php?operacio=esborrar&codi=".$usuari['codi']."'>
                     Esborrar</td>";
		echo "<td><a href='usuaris.php?operacio=actualitzar&codi=".$usuari['codi']."'>
                     Actualitzar</td>";
		echo "</tr>";
        }
        echo "</table>";

        echo $missatge;
?>
