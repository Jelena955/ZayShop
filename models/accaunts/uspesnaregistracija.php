

<?php




//dohvatanje svih podataka prosledjenih ajaxom za registraciju, provera i ako je sve ok registrovanje korisnika tj upisivanje u bazu





if(isset($_POST["dugme"])){



    http_response_code(200);
    $ime= $_POST["ime"];
$prezime=$_POST["prezime"];
$usernamep=$_POST["username"];
$mejl=$_POST["mejl"];
$password=$_POST["password"];
$password2=$_POST["password2"];
$pol=$_POST["pol"];


        $reIme = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";
        $rePrezime = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/"; 
        $reUsername = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
        $rePassword="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
        $reMejl="/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
        $reBmi="/^(0|[1-9]\d*)(.\d+)?$/";


        
        $greske=array();

        if($ime == ""){
            
           
            array_push($greske, "ime nije ok");
        }
        else{
            if(!preg_match($reIme, $ime)){
              
               
              array_push($greske, "ime nije ok");
                
            }
        }
    
        if($prezime == ""){
            
            
            arrey_push($greske, "prezime nije ok");
        }
        else{
            if(!preg_match($rePrezime, $prezime)){
                
                
                array_push($greske, "prezime nije ok");
            }
    
                
                
            }
        
        if($mejl == ""){
            
           
            array_push($greske, "mail nije ok");
        }
        else{
            if(!preg_match($reMejl, $mejl)){
                
                
                array_push($greske, "mail nije ok");
            }
    
                
                
            }
        

        if($usernamep == ""){
            
         
            array_push($greske, "username nije ok");
        }
        else{
            if(!preg_match($reUsername, $usernamep)){
                
                
                array_push($greske, "username nije ok");
            }
        }
        if($password == ""){
            
            
            array_push($greske, "password nije ok");
        }
        else{
            if(!preg_match($rePassword, $password)){
                
                
                array_push($greske, "password nije ok");
            }
        }
        if($password2 == ""){
            
            
            array_push($greske, "password2 nije ok");
        }
        else{
            if($password2!=$password){
                
                
                array_push($greske, "password2 nije ok");
            }
        }

       
     

        if(count($greske)==0){

           // echo("Sve ok");
           

            include("../../config/connection.php");
            if($conn){
               // echo("Konekcija je ok");
            
               // $upit2="insert into korisnik(ime,prezime,mejl,username,password) values ($ime, $prezime, $mejl, $username, $password)";
                    //$konekcija->query($upit2);
       try{ 

        if($pol=="Male"){
            $idpol=2;
        }
        else if($pol=="Female"){
            $idpol=1;

        }

        $password=$_POST["password"];
        $passwordiz=md5($password); 
     
        
      $usernamee=addslashes($usernamep);
      $mejll=addslashes($mejl);
      $status=1;
        
        $slika=7;
        $vr=1;
        $broj=md5(rand(1, 1000));
                $upit=$conn->prepare("insert into korisnici(idslika,ime,prezime,mejl,username,password,idpol,iduloga) values(:slika, :ime, :prezime, :mejl, :usernamep, :password, :pol, :iduloga)");
                $upit->bindParam(':ime', $ime);
                $upit->bindParam(':prezime', $prezime);
                $upit->bindParam(':mejl', $mejl);
                $upit->bindParam(':usernamep', $usernamep);
                $upit->bindParam(':password', $passwordiz);
                $upit->bindParam(':pol', $idpol);
                $upit->bindParam(':iduloga', $vr);
               
                $upit->bindParam(':slika', $slika);
               // $upit->bindParam(':broj', $broj);
                $rezultat=$upit->execute();
                 
              
                    header("Content-type: application/json");

                    $message="You are register successfuly";
                   
                    echo json_encode($message); 
                    http_response_code(200);

                
               

                
               
            }
            catch(PDOException $e){
               
               // echo $e->getMessage();
                header("Content-type: application/json");
             
                $message="You have not register";
                echo json_encode($message); 
                http_response_code(500);

                
               


            }
        }
        else{
            header("Content-type: application/json");
             
            $message="You have not register";
            echo json_encode($message); 

           // echo("Nije ok");
        }
    } }



else{
    http_response_code(404);

}




//echo($ime." ".$prezime." ".$username." ".$mejl." ".$password." ".$password2)






?>