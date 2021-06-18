<?php 

//funkcije za popunjavanje tabela za korpu u bazi
session_start();
require_once "../../config/connection.php";

if(isset($_POST['idproizvod'])){
    $idproizvod=$_POST['idproizvod'];
    $idkorisnik=$_SESSION['korisnik'];
    $izvrseno=0;
    $kolicina=1;
    $poslato='No';

    $resenje=executeeQuery("SELECT * from korpa WHERE idkorisnik=$idkorisnik AND izvrseno=0");
   // dohvata se red u kojem je necija korpa i proverava da li je to naruceno tj izvrseno, ukoliko takvog reda ima onda se uzima idkorpe, ako nema upisuje se sada taj id kada je u tom slucaju prvi put nesto stavljeno u korpu ili je ranije narucivano, ali je taj narudzbina poslata

    if(empty($resenje)){

        $upit=$conn->prepare("INSERT INTO korpa  (idkorisnik, izvrseno) VALUES(?,?)");
        $upit->execute([$idkorisnik, $izvrseno]);
        $idkorpa=$conn->lastInsertId();
        //za id se postavlja taj sto smo poslednji upravo uneli
    }

    else{
        foreach($resenje as $r){

        
       $idkorpa=$r->idkorpa;}

       //uzima se id korpe koj je vec postojao, ukoliko nije zakljucena narudzbina
}

//echo($idkorpa);

   try{

    $resenje2=executeeQuery("SELECT * from narudzbina WHERE idkorpa=$idkorpa AND idproizvod=$idproizvod");
//proverava se da li je ovaj proizvod vec u korpi, ako jeste samo mu se povecava kolicina
    if(empty($resenje2)){

    
   

    $upit2=$conn->prepare("INSERT INTO narudzbina (idkorpa,	idproizvod,	kolicina, poslato) VALUES(?,?,?,?)");
    $upit2->execute([$idkorpa,$idproizvod,$kolicina, $poslato]);}
//ako nije onda se upisuje u narudzbine
    else{

        $upit3=executeeQuery("SELECT kolicina from narudzbina WHERE idkorpa=$idkorpa AND idproizvod=$idproizvod");
        foreach($upit3 as $u3){
            $kolicinaizkorpe=$u3->kolicina;
        }

        $kolicina+=(int)$kolicinaizkorpe;
        //menjanje kolicine kada vec postoji u narucenom

        $upit2=$conn->prepare("UPDATE narudzbina set kolicina=?, poslato=?  WHERE idkorpa=$idkorpa AND idproizvod=$idproizvod");
    $upit2->execute([$kolicina, $poslato]);

    }

    $message="Succesfuly add to cart";
    echo json_encode($message);
    http_response_code(200);


}

catch(PDOException $ex){
    $message="Item id not add to cart";
    echo json_encode($message);
    http_response_code(500);


}

}

else{
    http_response_code(404);

    

}



?>