<?php

//dohvatanje odredjenog proizvoda preko idja
header('Content-Type: application/json');


if(isset($_GET['id'])){
    require_once '../../config/connection.php';

    $id = $_GET['id'];

    $rezultat = $conn->prepare("SELECT DISTINCT  p.idproizvod, p.naziv as naziv, p.ocena as ocena, p.cena as cena, p.opis as opis, b.naziv as brend, ps.glavna as glavna, s.src as src  FROM proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON s.idslika=ps.idslika INNER JOIN brend b ON p.idbrend=b.idbrend    WHERE p.idproizvod = ?");

    $rezultat->bindValue(1, $id);

    


    try {
        $rezultat->execute();
        $proiz = $rezultat->fetchAll();
        echo json_encode($proiz);
        http_response_code(200);
        
    }
    catch(PDOException $ex){
        echo json_encode(['poruka', 'Problem sa bazom: ' . $ex->getMessage()]);
        http_response_code(500);
    }
} else {
    http_response_code(400); 
}





?>