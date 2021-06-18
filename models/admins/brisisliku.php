<?php
include "funkcijeadmins.php";
//brisanje veze izmedju slike i proizvoda kada se brise proizvod
$id=$_POST['id'];
$idps=$_POST['idps'];

izbrisi('id', 'idps', 'proizvodslika', $idps);


?>