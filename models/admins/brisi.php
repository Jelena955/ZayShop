<?php 

//brisanje stvke iz menija
include "funkcijeadmins.php";
$id=$_POST['id'];
izbrisi('id', 'idmeni', 'meni', $id);





?>