<?php
        echo "<a href='projectes.php?operacio=formnou'>Nou</a>";
	echo "<table border=1>";
    	foreach($res as $projecte) {
		echo "<tr>"; 
		echo "<td>".$projecte['codi']."</td>";
		echo "<td>".$projecte['nom']."</td>";
		echo "<td>".$projecte['descripcio']."</td>";
		echo "<td>".$projecte['dataInici']."</td>";
		echo "<td>".$projecte['dataFi']."</td>";
		echo "<td>".$projecte['estat']."</td>";
		
		echo "<td><a href='projectes.php?operacio=esborrar&codi=".$projecte['codi']."'>
                     Esborrar</td>";
		echo "<td><a href='projectes.php?operacio=actualitzar&codi=".$projecte['codi']."'>
                     Actualitzar</td>";
		echo "</tr>";
        }
        echo "</table>";

        echo $missatge;
?>
