<?php

session_start();

//dodavanje profilne slike korisnika

$idkorisnik=$_SESSION['korisnik'];



$gde="../../assets/img/";

if(isset($_POST["dugmes"])){

    $imeslike=$_FILES["slika"]["name"];
    $privremeno=$_FILES["slika"]["tmp_name"];
    $velicina=$_FILES["slika"]["size"];
    $tip=$_FILES["slika"]["type"];
    $imeslike=time().$imeslike;

    $putanja=$gde . $imeslike;
    $putanjaresize=$gde .'mala'. $imeslike;
    $ekstenzija=pathinfo($putanja, PATHINFO_EXTENSION);
    $putanja2=$gde.$putanja.$ekstenzija;

    if($ekstenzija=='jpg' || $ekstenzija=='png'){

    

    $rezultat=move_uploaded_file($privremeno, $putanja);

    if($rezultat){
        echo("Uspesno ste uploadovali fajl");


        include "../../config/connection.php";

        
   
        $imes=addslashes($imeslike);
        $putanjas=addslashes($putanja);

        $upit2=$conn->prepare("INSERT INTO slika (src, alt) VALUES(:src, :alt)");
        $upit2->bindParam(":src", $imes);
        $upit2->bindParam(":alt", $velicina);
        

        
        
        if($upit2->execute()){
            $id= $conn->lastInsertId();
           
            
            echo("Uspesno uneto u bazu");
           

            $upit1="SELECT *  from slika";
            $rezultat=$conn->query($upit1);
            $rez=$rezultat->fetchAll();


            
           


            

            $upit3="SELECT *from korisnici WHERE idkorisnik=$idkorisnik";
            $rezultat3=$conn->query($upit3);
            $korisnik=$rezultat3->fetchAll();

            foreach($korisnik as $k){
                $ime=$k->ime;
               
                $prezime=$k->prezime;
                $mejl=$k->mejl;
                $iduloga=$k->iduloga;
                $idpol=$k->idpol;
                $username=$k->username;
                $password=$k->password;
                $idpol=(int)$idpol;
                $iduloga=(int)$iduloga;
                
             }
            // var_dump($id);
            // var_dump($last);


           
            var_dump($id);
            $id=(int)$id;

            $upit2=$conn->prepare("UPDATE korisnici SET ime=:ime, prezime=:prezime,  mejl=:mejl, password=:passwordp, iduloga=:iduloga, idslika=:id, idpol=:idpol, username=:username  WHERE idkorisnik=$idkorisnik");
          
 
  
           

            $upit2->bindParam(':id', $id);
            
            $upit2->bindParam(':ime', $ime);
            $upit2->bindParam(':prezime', $prezime);
            $upit2->bindParam(':mejl', $mejl);
            $upit2->bindParam(':iduloga', $iduloga);
            $upit2->bindParam(':idpol', $idpol);
            $upit2->bindParam(':username', $username);
            $upit2->bindParam(':passwordp', $password);
            
            
           
           $upit2->execute(); 

        header("Location:../../index.php?pages=korisnik.php");
           

        }



        else{
            echo("greska sa unosenjem u bazu");
        }
    }

    else{


        echo("Greska");
    }

   // header("Content-type:image/jpeg");


$novasirina=100;




$putanja=$gde . $imeslike;
$putanjaresize=$gde .'mala'. $imeslike;
var_dump($imeslike);



$novasirina=100;



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

}

else{
    $message="You can upload just jpg or png file";
    echo_json_encode($message);
}

}





   
else{
    echo("Ne moze");
}



?>