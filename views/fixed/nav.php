<nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Zay
            </a>
           

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">

                    <?php 


                     session_start(); 

                 
                   //Ispisivanje menija

                    include "models/meni/prikazmenija.php";
                    $rezultat=executeeQuery($upit);

                    foreach($rezultat as $rez){
                        if(isset($_SESSION['uloga'])){
                            //Ukoliko je neko ulogovan ne ispisuju se linkovi za Log in i registraciju
                           
                            if($rez->naziv!="Login" && $rez->naziv!="Register" ){
                                
                                echo("  <li class='nav-item'>
                                <a class='nav-link' href='$rez->href'>$rez->naziv</a>
                            </li>
                            ");
                              
                            }

                            

                          
                        }
                        else{

                        
                        echo("  <li class='nav-item'>
                        <a class='nav-link' href='$rez->href'>$rez->naziv</a>
                    </li>
                    ");}
                    }

                    if(isset($_SESSION['uloga'])){ 
                    if($_SESSION['uloga']=="1"){
                        //Ako je neko ulogovan ispisuje se link za profil i logout i ako je admin za admin panel
                        echo("<li class='nav-item'>
                        <a class='nav-link' href='index.php?pages=korisnik.php'>Profile</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link' href='index.php?pages=logout.php'>Log out</a>
                    </li>
                    
                    "
                    
                );

                    }
                    else if($_SESSION['uloga']=="2"){
                        echo("<li class='nav-item'>
                        <a class='nav-link' href='index.php?pages=korisnik.php'>Profile</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php?pages=admin.php'>Admin</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='index.php?pages=logout.php'>Log out</a>
                </li>
                    
                    ");

                    }}
                    
                    ?>
                    
                       
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        
                    </div>
                 <?php   if(isset($_SESSION['uloga'])){
                     //Ispisivanje korpe ako je neko ulogovan

                     echo("<a class='nav-icon position-relative text-decoration-none' href='index.php?pages=cart.php'>
                     <i class='fa fa-fw fa-cart-arrow-down text-dark mr-1 korpaklik'></i>
                     
                 </a>");

                 }
                     
                     ?>
                    
                   
                </div>
            </div>

        </div>
    </nav>