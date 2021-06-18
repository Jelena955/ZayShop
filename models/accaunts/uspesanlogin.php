<?php
session_start();

//dohvatanje podataka preko ajaxa za login provera, pravljenje sesija ukoliko postoji korisnik, kao i text fajla da je ulogovan, za kasniju statistiku na adminu

if(isset($_POST["dugme"])){

    $usernamep=$_POST["username"];
    $passwordp=$_POST["password"];

    $reUsername = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
    $rePassword="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";

    $greske=array();


    if($usernamep == ""){
            
         
        array_push($greske, "username nije ok");
    }
    else{
        if(!preg_match($reUsername, $usernamep)){
            
            
            array_push($greske, "username nije ok");
        }
    }
    if($passwordp == ""){
        
        
        array_push($greske, "password nije ok");
    }
    else{
        if(!preg_match($rePassword, $passwordp)){
            
            
            array_push($greske, "password nije ok");
        }
    }
       if(count($greske)==0){

        include("../../config/connection.php");
        if($conn){
         
          try{ 
             $passwordpp=md5($passwordp);

             $upit=$conn->prepare("SELECT * from korisnici WHERE username=? AND password=?");
             $upit->execute([$usernamep,$passwordpp]);
            if($upit->rowCount()==1){

                $red=$upit->fetch();
              
               $uloga=$red->iduloga;
                $korisnik=$red->idkorisnik;
                $imeses=$red->ime;
                $mailses=$red->mejl;
                $polses=$red->idpol;
                $date2=date("d-m-Y");
               $file= fopen("../../data/ulogovaniKorisnici.txt", "a");
               $zapis=$mailses."\t".$date2."\n";
               if($file){
                   fwrite($file, $zapis);
                   fclose($file);
               }
              

                $_SESSION['uloga']=$uloga;
                $_SESSION['korisnik']=$korisnik;
                $_SESSION['ime']=$imeses;
                $_SESSION['mejl']=$mailses;
                $_SESSION['pol']=$polses;


   }
            else{
              header("Content-type: application/json");
              unset($_SESSION['uloga']);
              
               $message="Invalid password or username";
               echo json_encode($message); 
            }
        }
        catch(PDOException $e){
            http_response_code(500);
          
            header("Content-type: application/json");
        
            $message="Invalid password or username";
            
           echo json_encode($message); 
           


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