<?php 

//dohvatanje po cemu se sortira i onda prosledjivanje funkciji

header("Content-type:application/json");



include "funkcijeproizvodi.php";
 

if(isset($_GET["sort"])){


$sort=$_GET["sort"];

$kategorije="";



try{ 

    //var_dump($kategoriju);
    

    if($sort=="lh"){



   $kategorije= sortiraj('cena');
     
   
      echo json_encode($kategorije);
     
        
   
       
        
      
    }
    else if($sort=="hl"){
        $kategorije= sortiraj('cena DESC');
     
   
      echo json_encode($kategorije);

    }
    else if($sort=="az"){
        $kategorije= sortiraj('naziv');
     
   
      echo json_encode($kategorije);

    }
    else if($sort=="za"){
        $kategorije= sortiraj('naziv DESC');
     
   
      echo json_encode($kategorije);

    }
    else if($sort=="Featured"){
        $kategorije= ispisfiltsve();
     
   
      echo json_encode($kategorije);

    }

    

  



}

catch(PDOExceptiom $e){

    echo $e->getMessage();
    http_response_code(500);
}}

else{

  http_response_code(404);

}
?>