<?php

//dohvatanje podataka i slanje ajaxom kada se posalje poruka i smestanje u bazu
session_start();

if(isset($_POST["dugme"])){

    $ime=$_POST["ime"];
    $mejl=$_POST["mejl"];
    $poruka=$_POST["poruka"];

    $reIme = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";
    $reMejl="/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
    $rePoruka="/^[A-Za-z0-9.,\s]{5,1000}$/";

    $greske=array();


    if($ime == ""){
            
         
        
        array_push($greske, "ime nije ok");
    }
    else{
        if(!preg_match($reIme, $ime)){
            
            
            array_push($greske, "ime nije ok");
        }
    }
    if($mejl == ""){
        
        
        array_push($greske, "mejlnije ok");
    }
    else{
        if(!preg_match($reMejl, $mejl)){
            
            
            array_push($greske, "mejl nije ok");
        }
    }

    if($poruka == ""){
        
        
        array_push($greske, "poruka nije ok");
    }
    else{
        if(!preg_match($rePoruka, $poruka)){
            
            
            array_push($greske, "poruka nije ok");
        }
    }


    if(count($greske)==0){

       // echo("Sve ok");

        include("../../config/connection.php");
        if($conn){
          //  echo("Konekcija je ok");
         
        
   try{ 

    $korisnik=$_SESSION["korisnik"];

   // var_dump($korisnik);


   

       
     
     
     
        $upit=$conn->prepare("INSERT into poruke (poruka, idkorisnik) values(:poruka, :korisnik)");
          
           

           

                $upit->bindParam(':poruka', $poruka);
                $upit->bindParam(':korisnik', $korisnik);
                $upit->execute(); 

                $message="Message sent";
                echo json_encode([ $message]); 


               
                 }
        catch(PDOException $e){
            http_response_code(500);
            echo $e->getMessage();
            header("Content-type: application/json");
            //$response['odgovor'] = 'Everything went better than expected.';
            $message="Message not sent";
            echo json_encode([ $message]); 

            
           


        }}
    }
    else{

       // echo("Nije ok");
    }
}



else{
http_response_code(404);

}








?>