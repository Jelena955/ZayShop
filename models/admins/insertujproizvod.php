<?php

//insertovanje proizvoda sa slikom, gde se cuvaju u originalnoj rezoluciji i u manjoj

require_once "../../config/connection.php";

$id=$_POST['id'];
$naziv=$_POST['naziv'];
$cena=$_POST['cena'];
$opis=$_POST['opis'];
$kategorija=$_POST['kategorija'];
$akcija=$_POST['akcija'];
$brend=$_POST['brend'];
$ocena=$_POST['ocena'];
$pol=$_POST['pol'];
$gde="../../assets/img/";
$imeslike=$_FILES["slika"]["name"];
    $privremeno=$_FILES["slika"]["tmp_name"];
    $velicina=$_FILES["slika"]["size"];
    $tip=$_FILES["slika"]["type"];
    $imeslike=time().$imeslike;
    $putanja=$gde . $imeslike;
    $putanjaresize=$gde .'mala'. $imeslike;
    $ekstenzija=pathinfo($putanja, PATHINFO_EXTENSION);
    $putanja2=$gde.$putanja.$ekstenzija;

if(isset($_POST['id'])){

   try{

   
    
    $upit=$conn->prepare("INSERT INTO proizvodi  (naziv, cena, ocena, opis, idpol, idkategorija, idakcija, idbrend) VALUES(?,?,?,?,?,?,?,?)");
    $upit->execute([$naziv,$cena,$ocena,$opis,$pol,$kategorija,$akcija,$brend
    ]);
   $poslednji= $conn->lastInsertId();

   if($ekstenzija=='jpg' || $ekstenzija=='png'){

    

    $rezultat=move_uploaded_file($privremeno, $putanja);

    if($rezultat){
        echo("Uspesno ste uploadovali fajl");


      

        

        $imes=addslashes($imeslike);
        $putanjas=addslashes($putanja);

        $upit2=$conn->prepare("INSERT INTO slika (src, alt) VALUES(:src, :alt)");
        $upit2->bindParam(":src", $imes);
        $upit2->bindParam(":alt", $velicina);
        

        
        
        if($upit2->execute()){
            $id= $conn->lastInsertId();
            $glavna="Yes";

            $upit3=$conn->prepare("INSERT INTO proizvodslika (idproizvod, idslika, glavna) VALUES(:idproizvod, :idslika, :glavna)");
            $upit3->bindParam(":idproizvod", $poslednji);
            $upit3->bindParam(":idslika", $id);
            $upit3->bindParam(":glavna", $glavna);
            $upit3->execute();



        
        
        }


        $novasirina=100;




$putanja=$gde . $imeslike;
$putanjaresize=$gde .'mala'. $imeslike;
var_dump($imeslike);



$novasirina=550;



list($sirina, $visina)=getimagesize($putanja);
//var_dump($privremeno);
$procenatpromene=$novasirina/$sirina;
$novavisina=$visina*$procenatpromene;

$thumb=imagecreatetruecolor($novasirina, $novavisina);
  if($ekstenzija=='png'){ 

$odcega=imagecreatefrompng($putanja);}

else if($ekstenzija=='jpg'){

    $odcega=imagecreatefromjpeg($putanja);

}


imagecopyresized($thumb, $odcega, 0,0,0,0, $novavisina,$novavisina,$sirina,$visina);
imagejpeg($thumb, $putanjaresize);
$slikapocetak=imagejpeg($thumb, $putanjaresize);
//imagecopyresized($thumb, $odcega, 0,0,0,0, $novavisina,$novavisina,$sirina,$visina);




imagedestroy($thumb);

$message="Succesfuly add Item";
echo json_encode($message);


   


}}}






catch(PDOException $ex){

$message=" Not Succesfuly add Item";
echo json_encode($Message);


}




}

?>