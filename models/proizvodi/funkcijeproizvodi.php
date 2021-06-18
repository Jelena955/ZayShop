<?php


//dohvatanje proizvoda odredjenog idja
function proizvodid($upit){ 

    require_once '../../config/connection.php';

header('Content-Type: application/json');


if(isset($_GET['id'])){
   

    $id = $_GET['id'];

    $rezultat = $conn->prepare($upit);

    $rezultat->bindValue(1, $id);

    try {
        $rezultat->execute();
        $velicina = $rezultat->fetchAll();
        echo json_encode($velicina);
        
    }
    catch(PDOException $ex){
        echo json_encode(['poruka', 'Problem sa bazom: ' . $ex->getMessage()]);
        http_response_code(500);
    }
} else {
    http_response_code(400); // 400 - Bad request
}}

//filtriranje po polu 
function ispisfilt($koji){

    require_once '../../config/connection.php';
    




$upit4="SELECT DISTINCT p.idproizvod as idproizvod, p.naziv as naziv, p.opis as opis, p.ocena as ocena, p.cena as cena, s.src as src, ps.glavna as glavna, po.naziv as pol FROM proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON ps.idslika=s.idslika INNER JOIN pol po ON p.idpol=po.idpol WHERE po.naziv='$koji'";
$rezultat=$conn->query($upit4);
$rez=$rezultat->fetchall();
  return $rez;}
//filtriranje po kategoriji
  function ispisfiltkat($koji){

    require_once '../../config/connection.php';
    




$upit4="SELECT DISTINCT * FROM proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON ps.idslika=s.idslika WHERE idkategorija='$koji'";
$rezultat=$conn->query($upit4);
$rez=$rezultat->fetchall();
  return $rez;}

  //dohvatanje svih proizvoda ako se klikne na All
  function ispisfiltsve(){
    
    require_once '../../config/connection.php';




$upit4="SELECT DISTINCT * from proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON ps.idslika=s.idslika ";
$rezultat=$conn->query($upit4);
$rez=$rezultat->fetchall();
  return $rez;}

  function sortiraj($sta){

    require_once '../../config/connection.php';

    $upit4="SELECT * FROM proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON ps.idslika=s.idslika ORDER BY $sta ";
$rezultat=$conn->query($upit4);
$rez=$rezultat->fetchall();
  return $rez;}

  //pretraga
  function pretraga($pretraga){


    require_once '../../config/connection.php';

    

    $upit4="SELECT* FROM proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON ps.idslika=s.idslika WHERE naziv LIKE '%$pretraga%' ";
$rezultat=$conn->query($upit4);
$rez=$rezultat->fetchall();
  return $rez;}


  

  

  





  

?>