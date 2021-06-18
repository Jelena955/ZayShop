<?php 


require_once "config/connection.php";
    

   //dohvatanje svega sto treba za prikaz proizvoda na adminu kroz funkciju executeQuery()
   $resenje=   executeeQuery("SELECT p.naziv as naziv, p.idproizvod as idproizvod, p.opis as opis, p.cena as cena, p.ocena as ocena, po.naziv as pol, p.idpol as idpol, s.idslika as idslika, ps.idps as idps, a.vrednost as akcija, p.idakcija as idakcija, b.naziv as brend, p.idbrend as idbrend, k.naziv as kategorija, p.idkategorija as idkategorija from proizvodi p INNER JOIN pol po ON p.idpol=po.idpol INNER JOIN akcija a ON a.idakcija=p.idakcija INNER JOIN kategorije k ON k.idkategorija=p.idkategorija INNER JOIN brend b ON b.idbrend=p.idbrend INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON ps.idslika=s.idslika WHERE ps.glavna='Yes'");

  
   $resenje2= executeeQuery("SELECT * from pol");

  
   $resenje5=  executeeQuery("SELECT * from akcija");

   $resenje4=  executeeQuery("SELECT * from kategorije");

   $resenje3=  executeeQuery("SELECT * from brend");

   




?>