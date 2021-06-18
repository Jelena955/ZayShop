
<?php



include 'models/logovi/posecenost.php';
include 'models/logovi/citajlog.php';

//ispisivanje strane ako je ulogovan admin

if(isset($_SESSION['uloga'] )){



if($_SESSION['uloga']==2){



?>





<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="assets/css/stile.css" rel="stylesheet">
<body>
  <div class="main-content">
    <div class="container mt-8">
      <!-- Table -->
      <h2 class="mb-5">Tables</h2><div class="row">

        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Statistict of visits</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Page</th>
                    <th scope="col">Url</th>
                    
                    <th scope="col">Number of visits today</th>
                    
                    <th scope="col">Percentage of visits from the beginning </th>
                    <th scope="col"> Update</th>
                    <th scope="col"> Delete</th>

                  </tr>
                </thead>
                <tbody>
                    <form>
                    

                <?php
                //ispisivanje tabele sa linkovima iz menija, statistike posecenosti strane
                // u toku dana, kao i od pocetka u procentima, mogucnost menjanja naziva

                foreach($rezultat as $r){

                    echo( "<tr>
                    <th scope='row'>
                      <div class='media align-items-center'>
                        <a href='#' class='avatar rounded-circle mr-3'>
                          <img alt='Image placeholder' src='https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/bootstrap.jpg'>
                        </a>
                        <div class='media-body'>
                         <input type='text' class='mb-0 text-sm'id='stranica.$r->naziv' value='$r->naziv'>
                        </div>
                      </div>
                    </th>
                    <td> <input type='text' class='mb-0 text-sm' id='link.$r->naziv' value='$r->href' disabled> </td>
                  
                   "
                );

                if($r->naziv=="Shop"){
                    echo("
                    <td>
                    <span class=' mr-4'>
                       $brsd
                    </span>
                  </td>
                 
                  <td>
                    <div class='d-flex align-items-center'>

                    <span class='mr-2'>$posetenasopu%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenasopu' aria-valuemin='0' aria-valuemax='100' style='width:$posetenasopu%;'></div>
                      </div>");
                }
                else if($r->naziv=="About"){
                    echo("
                    <td>
                    <span class=' mr-4'>
                       $brabd
                    </span>
                  </td>
                  <td>
                  <div class='d-flex align-items-center'>
                    
                    <span class='mr-2'>$posetenaonama%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenaonama' aria-valuemin='0' aria-valuemax='100' style='width: $posetenaonama%'></div>
                      </div>");
                }
                else if($r->naziv=="Contact"){
                    echo("
                    <td>
                    <span class=' mr-4'>
                       $brsd
                    </span>
                  </td>
                  <td>
                  <div class='d-flex align-items-center'>
                    
                    <span class='mr-2'>$posetenasopu%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenasopu' aria-valuemin='0' aria-valuemax='100' style='width:$posetenasopu%'></div>
                      </div>");
                }

                else if($r->naziv=="Home"){
                    echo("

                    <td>
                    <span class=' mr-4'>
                       $brhd
                    </span>
                  </td>
                  <td>
                  <div class='d-flex align-items-center'>
                    
                    <span class='mr-2'>$posetenahomeu%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenahomeu' aria-valuemin='0' aria-valuemax='100' style='width: $posetenahomeu%;'></div>
                      </div>");
                }

                else  if($r->naziv=="Login"){
                    echo("

                    <td>
                    <span class=' mr-4'>
                       $brld
                    </span>
                  </td>
                  <td>
                  <div class='d-flex align-items-center'>
                    
                    <span class='mr-2'>$posetenaloginu%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenaloginu' aria-valuemin='0' aria-valuemax='100' style='width: $posetenasopu%;'></div>
                      </div>");
                }

                else if($r->naziv=="Register"){
                    echo("
                    <td>
                    <span class=' mr-4'>
                       $brrd
                    </span>
                  </td>
                  <td>
                  <div class='d-flex align-items-center'>
                    
                    <span class='mr-2'>$posetenaregistraciji%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenaregistraciji' aria-valuemin='0' aria-valuemax='100' style='width:$posetenaregistraciji%'></div>
                      </div>");
                }

                

                echo("</div>
                </div>
              </td>
              <td class='text-right'>
                <button type='submit'class='updatujmeni' value='$r->naziv' name='$r->idmeni'> Update </button>
              </td>
              <td class='text-right' >
                <button type='submit'class='brisimeni' value='$r->naziv' name='$r->idmeni'> Delete </button>
              </td>
            </tr>
            <tr>");

           


                }
                
                ?>

<tr>
                    <th scope='row'>
                      <div class='media align-items-center'>
                        <a href='#' class='avatar rounded-circle mr-3'>
                          <img alt='Image placeholder' src='https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/bootstrap.jpg'>
                        </a>
                        <div class='media-body'>
                         <span> Korisnik </span>
                        </div>
                      </div>
                    </th>
                    <td> <span> index?pages=korisnik.php </span> </td>

<td>
                    <span class=' mr-4'>
                      <?php echo $brkd ?>
                    </span>
                  </td>
                  <td>
                  <div class='d-flex align-items-center'>
                    
                    <span class='mr-2'><?=$posetenakorisniku?>%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenahomeu' aria-valuemin='0' aria-valuemax='100' style='width: <?=$posetenakorisniku?>%;'></div>
                      </div>

                      </div>
                </div>
              </td>
              <td class='text-right'>
                <span> You can't update this row </span>
              </td>
              <td class='text-right' >
                <span>You can't delete this row </span>
              </td>
            </tr>
            <th scope='row'>
                      <div class='media align-items-center'>
                        <a href='#' class='avatar rounded-circle mr-3'>
                          <img alt='Image placeholder' src='https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/bootstrap.jpg'>
                        </a>
                        <div class='media-body'>
                         <span> Admin </span>
                        </div>
                      </div>
                    </th>
                    <td> <span> index?pages=admin.php </span> </td>

<td>
                    <span class=' mr-4'>
                      <?php echo $brad ?>
                    </span>
                  </td>
                  <td>
                  <div class='d-flex align-items-center'>
                    
                    <span class='mr-2'><?=$posetenaadminu?>%</span>
                    <div>
                      <div class='progress'>
                        <div class='progress-bar bg-warning' role='progressbar' aria-valuenow='$posetenahomeu' aria-valuemin='0' aria-valuemax='100' style='width: <?=$posetenaadminu?>%;'></div>
                      </div>

                      </div>
                </div>
              </td>
              <td class='text-right'>
                <span> You can't update this row </span>
              </td>
              <td class='text-right' >
                <span> You can't delete this row </span>
              </td>
            </tr>
            <tr>
                 
                  </tr>
            </form>
                </tbody>
              </table>
            </div>
          
          </div>
        </div>
      </div>
      <h1> <?php include "models/logovi/ulogovani.php"; echo($brojac); ?> users logged in today </h1></br>
      <h4> Log file </h4>

      <?php
     
//ispisivanje log fajla
dohvatiPodatke();

include 'models/admins/dohvatiproizvodezaadmin.php';

      
      ?>
      <!-- Dark table -->
      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Items</h3>
             <a href='models/eksport/skinieksel.php?dugme=dugme'> <h6>Download tabele for Items</h6></a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    
                  </tr>
                </thead>
                <form>
                <tbody>

                <?php 
                //ispisivanje tabele sa proizvodima. Mogucnost updatovanja, deletea

                foreach($resenje as $re){

                    echo("<tr>
                    <th scope='row'>
                      <div class='media align-items-center'>
                        
                      
                      <input type='text' class='mb-0 text-sm' id='naziv.$re->idproizvod' value='$re->naziv'>
                        
                    </th>
                    <td>
                    <input type='text' class='mb-0 text-sm' id='ocena.$re->idproizvod' value='$re->ocena'>
                    </td>
                    <td>
                      <input type='text' class='mb-0 text-sm' id='cena.$re->idproizvod' value='$re->cena'>
                     
                      
                      
                    </td>
                    <td>
                   
                    <input type='text' class='mb-0 text-sm' id='opis.$re->idproizvod' value='$re->opis'>
                    
                    

                        
                    </td>
                    <td>
                      <select id='pol.$re->idproizvod'>
                      <option value='$re->idpol'>$re->pol</option>");
                      foreach($resenje2 as $re2){
                          if($re->pol==$re2->naziv){
                              continue;
                          }
                          else{
                              echo("<option value='$re2->idpol'>$re2->naziv</option>");
                          }
                      }
                   
                   
                   echo( " </select<</td>
                    <td class='text-right'>
                    <select id='brend.$re->idproizvod'>
                    <option value='$re->idbrend'>$re->brend</option>");
                    foreach($resenje3 as $re3){
                        if($re->brend==$re3->naziv){
                            continue;
                        }
                        else{
                            echo("<option value='$re3->idbrend'>$re3->naziv</option>");
                        }
                    }
                    echo( " </select<</td>
                    <td class='text-right'>
                    <select id='kategorija.$re->idproizvod'>
                    <option value='$re->idkategorija'>$re->kategorija</option>");
                    foreach($resenje4 as $re4){
                        if($re->kategorija==$re4->naziv){
                            continue;
                        }
                        else{
                            echo("<option value='$re4->idkategorija'>$re4->naziv</option>");
                        }
                    }
                    echo( " </select<</td>
                    <td class='text-right'>
                    <select id='akcija.$re->idproizvod'>
                    <option value='$re->idakcija'>$re->akcija</option>");
                    foreach($resenje5 as $re5){
                        if($re->akcija==$re5->vrednost){
                            continue;
                        }
                        else{
                            echo("<option value='$re5->idakcija'>$re5->vrednost</option>");
                        }
                    }
                  echo("<td> <button border-color='white' type='submit'class='editujproizvod' value='$re->idproizvod' >Update</buttton</td>
                  <td> <button type='submit' class=' brisiproizvod' name='$re->idps' value='$re->idproizvod' >Delete</buttton</td>
                  
                  </tr>
                  <tr>");
                }
                
                ?>








            <!--      <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Argon Design System</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $2,500 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> pending
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/angular.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Angular Now UI Kit PRO</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $1,800 USD
                    </td>
                    <td>
                      <span class="badge badge-dot">
                        <i class="bg-success"></i> completed
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/sketch.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Black Dashboard</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $3,150 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i> delayed
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">72%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/react.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">React Material Dashboard</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $4,400 USD
                    </td>
                    <td>
                      <span class="badge badge-dot">
                        <i class="bg-info"></i> on schedule
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">90%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/vue.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Vue Paper UI Kit PRO</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $2,200 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> completed
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>-->
                </tbody>
            </form enctype='multipart/form-data'>
              </table>
            </div>
          </div>
        </div>
        
      </div>

      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Insert item</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                    <th scope="col">Image</th>
                    <th scope="col">Insert</th>
                    
                    
                  </tr>
                </thead>
                <form>
                <tbody>

                <tr>
                    <th scope='row'>
                      <div class='media align-items-center'>
                        
                      
                      <input type='text' class='mb-0 text-sm' id='naziv' value=''>
                        
                    </th>
                    <td>
                    <input type='text' class='mb-0 text-sm' id='ocena' value=''>
                    </td>
                    <td>
                      <input type='text' class='mb-0 text-sm' id='cena' value=''>
                     
                      
                      
                    </td>
                    <td>
                   
                    <input type='text' class='mb-0 text-sm' id='opis' value=''>
                    
                    

                        
                    </td>
                    <?php
  //mogucnost insertovanja proizvoda
echo( "</td>
<td class='text-right'>
<select id='pol'>");

foreach($resenje2 as $re2){
    
        echo("<option value='$re2->idpol'>$re2->naziv</option>");
    }

    echo( "</select></td>
<td class='text-right'>
<select id='brend'>");

foreach($resenje3 as $re3){
    
        echo("<option value='$re3->idbrend'>$re3->naziv</option>");
    }

    echo( "</select></td>
<td class='text-right'>
<select id='kategorija'>");

foreach($resenje4 as $re4){
    
        echo("<option value='$re4->idkategorija'>$re4->naziv</option>");
    }

    echo( "</select></td>
<td class='text-right'>
<select id='akcija'>");



foreach($resenje5 as $re5){
    
        echo("<option value='$re5->idakcija'>$re5->vrednost</option>");
    }

    


    echo("<td><input type='file'  id='slika'></td><td> <button border-color='white' type='submit'id='insertproizvod' value='insert' >Insert</buttton</td>
    
    
    </tr>
    <tr>");



                    
                    ?>

                    



                </form>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Messages</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Delete</th>
                    
                  </tr>
                </thead>
                <form>
                <tbody>
                   
                        <?php
                        //ispisivanje poruka, mogucnost brisanja
                        include "models/admins/dohvatiporuke.php";
                        foreach($resenje6 as $re6){

                            echo("<tr><td>$re6->username</td>
                                  <td>$re6->poruka </td>
                                  <td>$re6->datum</td>
                                  <td><button type='submit' class='poruka' value='$re6->idporuka'>Delete </button> </td> </tr>");
                        }
                        
                        
                        ?>
                         
                   

                </form>
              </table>
            </div>
          </div>
        </div>
                    </div>

                  

<div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Order list</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Id of order</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                   
                    
                  </tr>
                </thead>
                <form>
                <tbody>

                <?php
                //Uvid u sve narudzbine
                        include 'models/admins/ispisnarudzbina.php';
                        foreach($narudzbine as $n){

                            echo("<tr><td>$n->username</td>
                                  <td>$n->idkorpa </td>
                                  <td>$n->naziv</td>
                                  <td>$n->kolicina</td>
                                 ");
                        }
                        
                        
                        ?>


                </form>
              </table>
            </div>
          </div>
        </div>
                    </div>
                   


  </div>
  <?php }}
  //Zabranjen pristup strani ako nije ulogovan admin
  else echo("<h1>You do not have access to this page</h1>")?>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright"><p>Made with <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon Dashboard</a> by Creative Tim</p>
        </div>
      </div>
    </div>
  </footer>
</body>



