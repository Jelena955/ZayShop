<?php 

function izvuciSliku($koji){
//funkcija za izvlacenje slike korisnika i one za prikaz kada je potrebna u manjoj rezoluciji
    require_once 'config/connection.php';
    




$upit4="SELECT * FROM korisnici k INNER JOIN slika s ON k.idslika=s.idslika WHERE idkorisnik='$koji'";
$rezultat=$conn->query($upit4);
$rez=$rezultat->fetchall();
foreach($rez as $r){
    $slika=$r->src;
   global $slikaprikaz;
   $slikaprikaz='mala'.$slika;


}
}



   



    

    function ispisi(){


        include_once 'config/connection.php';


//ispis preporucenih proizvoda za koriisnika u zavisnosti koj je pol, kroz funkciju executequery
  


$pol=$_SESSION["pol"];


if($pol=="1"){


        return executeeQuery("SELECT DISTINCT p.naziv as naziv, p.ocena as ocena, p.cena as cena, s.src as src FROM proizvodi p  INNER JOIN pol po ON p.idpol=po.idpol INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON s.idslika=ps.idslika WHERE po.naziv='Woman' and ps.glavna='Yes' ");}
        



else if($pol=="2"){

    return executeeQuery("SELECT DISTINCT p.naziv as naziv, p.ocena as ocena, p.cena as cena, s.src as src FROM proizvodi p  INNER JOIN pol po ON p.idpol=po.idpol INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON s.idslika=ps.idslika WHERE po.naziv='Man' and ps.glavna='Yes' ");

}
}
        

   

    
  // var_dump($conn);

  

  





  



?>