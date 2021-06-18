<?php 

//preko sesije idija dohvatanje ulogovanog korisnika i izvlacenje njegovih podataka

require_once 'config/connection.php';




$idkorisnik=$_SESSION['korisnik'];

$idkorisnik=(int)$idkorisnik;


$rezultat = $conn->prepare("SELECT * from korisnici k INNER JOIN slika s ON s.idslika=k.idslika WHERE idkorisnik=?");

$rezultat->bindValue(1, $idkorisnik);

try {
    $rezultat->execute();
    $korisnik= $rezultat->fetchAll();
   
    
}
catch(PDOException $ex){
    echo json_encode(['poruka', 'Problem sa bazom: ' . $ex->getMessage()]);
    http_response_code(500);


}


   
    
    
   


?>