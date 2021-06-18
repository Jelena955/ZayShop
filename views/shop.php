

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
         <?php  
         //Ako je neko ulogovan ispisivanje hidden polja da bi u jsu moglo nesto da se ispisuje ili ne u zavisnosti na to
          if(isset($_SESSION['korisnik'])){
                    $ulogovan=1;
                }
                else{

                    $ulogovan=0;

                }

                echo(" <input type='hidden' id='ulogovan' value='$ulogovan'>");?>
                
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none pol" id='all' href="#">All</a></li>
                        <?php 
                        //ispisivanje linkova za filtriranje za pol
                         require_once 'models/kategorije/prikazsvihkat.php';
                         $pol=getGender();
                         foreach($pol as $p){

                            echo(" <li><a class='text-decoration-none pol' id='$p->naziv' href='#'>$p->naziv</a></li>");

                         }
                        
                        ?>
                           
                            
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Sale
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                        <?php
                        //ispisivanje linkova za proizvode na akciji
                          $akcija=getSales();
                          foreach($akcija as $a){
                              echo("<li><a class='text-decoration-none proizvod' data-id='$a->idproizvod' href='#'>$a->naziv</a></li>");
                          }
                        
                        ?>
                      
                            
                            
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <?php
                            //ispisivanje linkova za filtriranje  za kategorije
                          
                           $kategorije = getCategories();
                           echo("<li><a class='text-decoration-none kategorija' href='#' id='all'>All</a></li>");

                            foreach($kategorije as $rez){
                                echo(" <li><a class='text-decoration-none kategorija' href='#' id='$rez->idkategorija'>$rez->naziv</a></li>
                            ");
                            }
                            
                            ?>
                           
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                     
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control" id='sortiranje'>
                                <option class='sortiranje' value='Featured'>Featured</option>
                                <option class='sortiranje' value='az'>A to Z</option>
                                <option class='sortiranje' value='za'>Z to A</option>
                                <option class='sortiranje' value='lh'>Low to Heigh</option>
                                <option class='sortiranje' value='hl'>Heigh to Low</option>
                            </select>

                        <div> </div>
                        </div>
                        <form  method="post" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id='pretragatekst' name="pretraga" placeholder="Search ...">
                    <input type="submit"  id="pretraga" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </input>
                </div>
            </form>
                        
                    </div>
                </div>
                <div class="row" id='proizvodi'>
                <?php
                include "models/proizvodi/prikazsvihproizvoda.php";
                //dohvatanje svih proizvoda i njihov ispis
               

                $proizvodi=getAllItems();
                foreach($proizvodi as $proizvod){

                    if($proizvod->glavna=='Yes'){

                    echo("<div class='col-md-4'>
                    <div class='card mb-4 product-wap rounded-0'>
                        <div class='card rounded-0'>
                       

                           

                           
                            <img class='card-img rounded-0 img-fluid' src='assets/img/mala$proizvod->src'>
                         
                          <div class='card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center'>
                                <ul class='list-unstyled'>
                                    
                                    <li><a class='btn btn-success text-white mt-2 proizvod'  data-id='$proizvod->idproizvod'><i class='far fa-eye'></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class='card-body'>
                            <a href='shop-single.html' class='h3 text-decoration-none'>$proizvod->naziv</a>
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

                                $m=0;

                                //ispisivanje odredjenog broja zvezdica za rejting u osnosu na ocenu iz baze

                                for($m=0;$m<$proizvod->ocena;$m++){
                                    echo(" <i class='text-warning fa fa-star'></i>");
                                }
                                   
                                echo(" 
                                </li>
                            </ul>
                            <p class='text-center mb-0'>$$proizvod->cena</p>
                        </div>
                    </div>
                </div>
                ");

                }}
                echo("<section class='bg-light' id='proiz' style='visibility:hidden'>
               
            </section>");
                
                ?>
                    
                   
                        </div>
                    </div>
                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
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
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


    <!-- Start Footer -->
    