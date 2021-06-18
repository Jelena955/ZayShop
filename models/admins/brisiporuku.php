<?php 

//brisanje poruka preko funkcije izbrisi 
include "funkcijeadmins.php";
$id=$_POST['id'];
izbrisi('id', 'idporuka', 'poruke', $id);





?>