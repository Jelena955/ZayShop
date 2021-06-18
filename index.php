<!DOCTYPE html>
<html lang="en">



<?php

// Ubacivanje fiksnih delova


include "views/fixed/head.php";
?>
<body>
   
    <?php
include "views/fixed/navside.php";
  
include "views/fixed/nav.php";

include "views/fixed/modal.php";

    //ubacivanje razlicitih delova, u zavisnosti na kojoj stranici se nalazi korisnik

    if(!isset($_GET['pages'])){
        include "views/home.php";
    }

    else{
        switch($_GET['pages']){
            case "about.php";
            include "views/about.php";
            break;

            case "contact.php";
            include "views/contact.php";
            break;

           

            case "shop.php";
            include "views/shop.php";
            break;

            case "register.php";
            include "views/register.php";
            break;

            case "login.php";
            include "views/login.php";
            break;

            case "single.php";
            include "views/single.php";
            break;

            case "korisnik.php";
            include "views/korisnik.php";
            break;

            case "admin.php";
            include "views/admin.php";
            break;

            case "logout.php";
            include "views/logout.php";
            break;

            case "cart.php";
            include "views/cart.php";
            break;

            default:
            include "views/home.php";
            break;
        }
    }
    
    
    include "views/fixed/footer.php";
   
    include "views/fixed/script.php";
    ?>
   
    <!-- End Script -->
</body>

</html>