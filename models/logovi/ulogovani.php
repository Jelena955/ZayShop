<?php 

//iz fajla gde su podaci o ulogovanim, pocepano i izvuceno ko se ulogovao tekuceg dana i njihov broj

$dan=date("d-m-Y");
$brojac=0;

try{
    $file=file("data/ulogovaniKorisnici.txt");
    foreach($file as $index=>$value){
        list($mejl, $date)=explode("\t", $value);
        $danulogovanog=$date;
        if($dan=$date){
            $brojac++;
        }
    }
}

catch(PDOException $ex){

}


?>