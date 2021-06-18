<?php 

//editovanje naziva u meniju kroz funkciju
include "funkcijeadmins.php";
$id=$_POST['id'];
$link=$_POST['link'];
$stranica=$_POST['stranica'];
edituj('id', 'meni', $stranica, $link, $id);


?>