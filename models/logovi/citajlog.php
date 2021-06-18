<?php

//ispisivanje svih logova na adminu

function dohvatiPodatke(){
	
	@ $podaciUNizu = file('data/log.txt');
$brojElemenataNiza = count($podaciUNizu);

echo("<form action='brisi.php' method='post'>");
echo("<table border='0px'>");
echo("<tr><td>Page</td><td>Date</td><td>IP</td></tr>");

for($i=0; $i<$brojElemenataNiza; $i++){
	//prolazim kroz svaki element niza, a to je zapis o kejdnom klijentu
	$pocepaniElementNiza = explode("\t", $podaciUNizu[$i]);
	echo("<tr>");
	echo("<td>". $pocepaniElementNiza[0]."</td>");
	echo("<td>". $pocepaniElementNiza[1]."</td>");
    echo("<td>". $pocepaniElementNiza[2]."</td>");
	
	echo("</tr>");
}
echo("</table>");

echo("</form>");
}
?>