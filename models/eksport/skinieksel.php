<?php

//Skidanje tabele sa proizvodima, dohvatanje njig funkcijom
    if(isset($_GET['dugme'])){
        require_once "../../config/connection.php";
            require_once "../proizvodi/prikazsvihproizvoda.php";
            $resenje=getAllItems();
            $excel="";
                
            if(count($resenje)>0){
                $excel.='<table class="table"> 
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Rating</th>
                  </tr>
                </thead>
                <tbody>';
                    foreach($resenje as $r){
                        $excel.='<tr>
                           
                            <td>'.$r->idproizvod.'</td>
                            <td>'.$r->naziv.'</td>
                            <td>'.$r->cena.'</td>
                            <td>'.$r->ocena.'</td>
                           
                        </tr>';
                    }
              $excel.='</tbody>
              </table>';
            }
    
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=ItemsZayShop.xls");
            echo $excel;
        }
        
    else{
        header("location: ../404Page.php?notFound");
        $code=404;
        $msg="Page not found.";
    }
?>