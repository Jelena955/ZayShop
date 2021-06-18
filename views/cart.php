<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Cart</h1>
       
    </div>
<?php
//ispis proizvoda koji su u korpi

    require_once "models/proizvodi/ispisiizkorpe.php";
?>



    <div class="row mt-5">
        <div class="col">
            <?php  //Ako ima ista u korpi ispisuje se tabela
             if(!empty($resenje)){?>
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Card tables</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    
                    
                    
                  </tr>
                </thead>
                <form>
                <tbody>
                <?php

               

                //ispis svih proizvoda iz korpe
                foreach($resenje as $re){

                    $idkorpa=$re->idkorpa;

                    echo( " 

                
                <tr>
                   

                <td>

                <img width='60px' src='assets/img/mala$re->src' alt='$re->alt'>
                </td>
                <td>

                <span>$re->naziv </span>
                </td>
                <td>

                <span>$re->cena </span>
                </td>
                <td>

                <input id='kolicina.$re->idnarudzbina' value='$re->kolicina '>
                </td>

                <td>

                <button type='submit' class='promenikolicinu' value='$re->idnarudzbina'>Change quantity </button>
                <input type='hidden' value='$re->idkorpa' id='korpa.$re->idnarudzbina'>
                <input type='hidden' value='$re->idproizvod' id='proizvod.$re->idnarudzbina'>
                <input type='hidden' value='$re->poslato' id='poslato.$re->idnarudzbina'>
                </td>

                <td>

                <button type='submit' class='brisiizkorpe' value='$re->idproizvod'>Delete </button>
                <input type='hidden' value='$re->idnarudzbina' id='skriveno.$re->idproizvod'>
                </td>
                  
</tr> "); }

?>


</tbody>
</table>



<div> <button id='kupi' type='submit' value='<?=$idkorpa?>'> Buy </button> </div>

</form>
<?php  }
//ukoliko nema proizvoda pise da je korpa prazna
else{
  echo( " <h3 class='text-white mb-0'>you do not have any item in cart</h3>");
}







?>



