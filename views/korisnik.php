<?php 

if(isset($_SESSION['uloga'] )){

    include "models/accaunts/dohvatikorisnika.php";


  //mogucnost pristupa stranici samo ako je setovana sesija uloga tj neko ulogovan

   foreach($korisnik as $k){
      $ime=$k->ime;
      $slika=$k->src;
   }


?>

<section class="bg-success py-5">
<div class="container">
    <div class="row align-items-center py-5">
        <div class="col-md-8 text-white">
            <h1>Hello <?php echo($ime); //ispis imena korisnika ?></h1> 
            <p>ZayShop is a global lifestyle brand that exemplifies bold,
                     progressive ideals and a seductive aesthetic. We seek to thrill and inspire our
                     audience while using provocative imagery and striking designs to ignite the senses.
            </p>
        </div>
        <div class="col-md-4">
            <img src="assets/img/<?php echo($slika); //prikazivanje profilne slike korisnika ?>" alt="About Hero" width='200px'>
            <form method="post" action='models/accaunts/dodajsliku.php' enctype='multipart/form-data'>
            <input type='file' name='slika'>
            <input type='submit' name='dugmes'>

            
            </form>
        </div>
    </div>
</div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
<div class="row text-center pt-5 pb-3">
    <div class="col-lg-6 m-auto">
        <h1 class="h1">Our Services</h1>
        <p>
           
        </p>
    </div>
</div>
<div class="row">

    <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
            <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
            <h2 class="h5 mt-4 text-center">Delivery Services</h2>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
            <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
            <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
            <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
            <h2 class="h5 mt-4 text-center">Promotion</h2>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
            <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
            <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
        </div>
    </div>
</div>

<div class="row">
<h1>
Recommended for you:</h1>

                                    <?php //ispisivanje preporucenih proizvoda korisnika u odnosu na pol

                                   require_once "models/accaunts/funkcijeaccounts.php";
                                   
                                   $proizvodi=ispisi();

                                   foreach($proizvodi as $p){
        echo("<div class='col-md-4'>
       <div class='card mb-4 product-wap rounded-0'>
                                        <div class='card rounded-0'>
                                            <img class='card-img rounded-0 img-fluid' src='assets/img/mala$p->src'>
                                            <div class='card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center'>
                                               <a href='index.php?pages=shop.php'> <button> Go to shop </button> </a>
                                            </div>
                                        </div>
                                        <div class='card-body'>
                                            <a href='shop-single.html' class='h3 text-decoration-none'>$p->naziv</a>
                                            <ul class='w-100 list-unstyled d-flex justify-content-between mb-0'>
                                                
                                                <li class='pt-2'>
                                                    <span class='product-color-dot color-dot-red float-left rounded-circle ml-1'></span>
                                                    <span class='product-color-dot color-dot-blue float-left rounded-circle ml-1'></span>
                                                    <span class='product-color-dot color-dot-black float-left rounded-circle ml-1'></span>
                                                    <span class='product-color-dot color-dot-light float-left rounded-circle ml-1'></span>
                                                    <span class='product-color-dot color-dot-green float-left rounded-circle ml-1'></span>
                                                </li>
                                            </ul>
                                            <ul class='list-unstyled d-flex justify-content-center mb-1'>
                                                <li>");
//ispisivanje zvezdica za ocenu u osnosu na ocenu iz baze
                                                $m=0;
                
                                                for($m=0;$m<$p->ocena;$m++){
                                                    echo(" <i class='text-warning fa fa-star'></i>");
                                                }
                                                   
                                                echo(" 
                                                </li>
                                            </ul>
                                            <p class='text-center mb-0'>$$p->cena</p>
                                        </div>
                                    </div>
                                </div>
                                ");
                                   }
                                    
                                    ?>
                                    
                                     </div>
</section>
<!-- End Section -->

<!-- Start Brands -->
<section class="bg-light py-5">
<div class="container my-4">
    <div class="row text-center py-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Our Brands</h1>
        
        </div>
        <div class="col-lg-9 m-auto tempaltemo-carousel">
            <div class="row d-flex flex-row">
                <!--Controls-->
                <div class="col-1 align-self-center">
                    <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                        <i class="text-light fas fa-chevron-left"></i>
                    </a>
                </div>
                <!--End Controls-->

                <!--Carousel Wrapper-->
                <div class="col">
                    <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                        <!--Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                    </div>
                                </div>
                            </div>
                            <!--End First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--End Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                    </div>
                                </div>
                            </div>
                            <!--End Third slide-->

                        </div>
                        <!--End Slides-->
                    </div>
                </div>
                <!--End Carousel Wrapper-->

                <!--Controls-->
                <div class="col-1 align-self-center">
                    <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                        <i class="text-light fas fa-chevron-right"></i>
                    </a>
                </div>
                <!--End Controls-->
            </div>
        </div>
    </div>
</div>
</section>

<?php 

        }
   else{
       //Nemoguc pristup ako sesija nije setovana

    echo("<h1> You do not have access to this page</h1>");

          }


?>
<!--End Brands-->













