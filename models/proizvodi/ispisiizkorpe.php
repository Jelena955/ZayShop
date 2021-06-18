<?php

//ispisivanje korisniku proizvoda koje je stavio u korpu i nije konacno narucio

if(isset($_SESSION['korisnik'])){

    require_once "config/connection.php";

    $idkorisnik=$_SESSION['korisnik'];

    try{
      $resenje=  executeeQuery("SELECT  * from proizvodi p INNER JOIN narudzbina n ON p.idproizvod=n.idproizvod INNER JOIN korpa k ON k.idkorpa=n.idkorpa INNER JOIN korisnici ko ON ko.idkorisnik=k.idkorisnik INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON s.idslika=ps.idslika WHERE k.idkorisnik=$idkorisnik AND k.izvrseno=0 AND ps.glavna='Yes'");
      http_response_code(200);
    
    }

    catch(PDOException $ex){
      http_response_code(500);
        
    }





}

else{

    echo("You must be login to have a cart");
}


?>