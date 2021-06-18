<?php 

//zakljucavanje porudzbine, tj ukoliko se klikne na kupi u korpi se stavlja da je izvrseno i svaki sledeci dodat proizvod se stavlja sa novim idkorpe, i korisniku se daje obavestenje da je narudzbina poslata i sklanjaju se proizvodi iz korpe
session_start();

require_once "../../config/connection.php";


$idkorisnik=$_SESSION['korisnik'];
$izvrseno=1;
$idkorpa=$_POST['idkorpa'];





if(isset($_POST['idkorpa'])){


    try{

    
    $upit=$conn->prepare("UPDATE korpa set  izvrseno=?, idkorisnik=? WHERE idkorpa=?");
    $upit->execute([$izvrseno,$idkorisnik,$idkorpa]);

    header("Content-type: application/json");

    $message='Your order is sent sucessfuly';
    echo json_encode($message);
    http_response_code(200);


}

   



    catch(PDOException $ex){
        header("Content-type: application/json");

        $message='Your order is not sent sucessfuly';
        echo json_encode($message);
        http_response_code(500);


    }


}

else{
    http_response_code(404);

}


?>