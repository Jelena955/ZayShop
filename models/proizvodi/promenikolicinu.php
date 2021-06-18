<?php 

//U korpi mogucnost promene kolicine nekog proizvoda


require_once "../../config/connection.php";

$idnarudzbina=$_POST['idnarudzbina'];
$kolicina=$_POST['kolicina'];
$poslato=$_POST['poslato'];
$idkorpa=$_POST['idkorpa'];
$idproizvod=$_POST['idproizvod'];




if(isset($_POST['idnarudzbina'])){

    try{

    
    $upit=$conn->prepare("UPDATE narudzbina set kolicina=?, idkorpa=?, poslato=?, idproizvod=? WHERE idnarudzbina=?");
    $upit->execute([$kolicina,$idkorpa,$poslato,$idproizvod,$idnarudzbina]);
    http_response_code(200);


}

    catch(PDOException $ex){
        http_response_code(500);


    }


}

else{
    http_response_code(404);

}


?>