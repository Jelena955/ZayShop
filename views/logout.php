<?php 
//unsetovanje sesija kad se neko izloguje 


unset($_SESSION['uloga']);
unset($_SESSION['korisnik']);
unset($_SESSION['ime']);
unset($_SESSION['mejl']);
unset($_SESSION['status']);


?>

<div class="col-lg-3 m-auto">
                    <h1 class="h1"> Goodbye!</h1>
                    
                </div>

