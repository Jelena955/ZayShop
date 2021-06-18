<?php 


header("Content-type:application/json");


//prosledjivanje iz tekst polja i slanje funkciji za pretragu
include "funkcijeproizvodi.php";
 


$pretraga=$_POST["pretraga"];

$kategorije="";



try{ 

    //var_dump($kategoriju);
    

    if($pretraga==""){



   $kategorije= ispisfiltsve();
     
   
      echo json_encode($kategorije);
     
        
   
       
        
      
    }

    else {
       

       // $pretragaa=strtolower($pretraga);
        $kategorije=pretraga($pretraga);
      echo  json_encode($kategorije);
      http_response_code(200);
      

    }

  



}

catch(PDOExceptiom $e){

    echo $e->getMessage();
    http_response_code(500);
}
?>