<?php 

//funkcija za brisanje
function izbrisi($dugme, $sta, $odakle, $id){
    require_once "../../config/connection.php";
    if(isset($_POST[$dugme])){

        $upit=$conn->prepare("DELETE FROM $odakle WHERE $sta=?");
        $upit->execute([$id]);
        
    }
}

///funkcija za odredjeno editovanje
function edituj($dugme, $odakle, $stranica, $link, $id){
    require_once "../../config/connection.php";
    if(isset($_POST[$dugme])){
        $upit=$conn->prepare("UPDATE $odakle set naziv=?, href=? WHERE idmeni=?");
        $upit->execute([$stranica, $link, $id]);

    }

   
}


?>