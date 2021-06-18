<?php 

//brisanje proizvoda preko funkcije izbrisi()
include "funkcijeadmins.php";

$id=$_POST['id'];


izbrisi('id', 'idproizvod', 'proizvodi', $id);





?>