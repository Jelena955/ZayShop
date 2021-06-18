<?php 


header("Content-type:application/json");
//filtriranje kategorija


include "funkcijeproizvodi.php";
 


$kat=$_GET["kat"];

$kategorije="";



try{ 

    
    

    if($kat=="all"){



   $kategorije= ispisfiltsve();
     
   
      echo json_encode($kategorije);
     
        
   
       
        
      
    }

    else {

        $kategorije=ispisfiltkat($kat);
      echo  json_encode($kategorije);
      

    }

  



}

catch(PDOExceptiom $e){

    echo $e->getMessage();
    http_response_code(500);
}
?>