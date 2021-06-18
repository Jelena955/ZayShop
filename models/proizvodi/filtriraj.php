<?php 

//dohvatanje sta se filtrira i prosledjivanje funkciji

header("Content-type:application/json");



include "funkcijeproizvodi.php";
 


$pol=$_GET["pol"];

$kategorije="";



try{ 

    //var_dump($kategoriju);
    

    if($pol=="all"){



   $kategorije= ispisfiltsve();
     
   
      echo json_encode($kategorije);
     
        
   
       
        
      
    }

    else {

        $kategorije=ispisfilt($pol);
      echo  json_encode($kategorije);
      

    }

  



}

catch(PDOExceptiom $e){

    echo $e->getMessage();
    http_response_code(500);
}
?>