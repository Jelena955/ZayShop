<?php

//update proizvoda na adminu

require_once "../../config/connection.php";

$id=$_POST['id'];
$naziv=$_POST['naziv'];
$cena=$_POST['cena'];
$opis=$_POST['opis'];
$kategorija=$_POST['kategorija'];
$akcija=$_POST['akcija'];
$brend=$_POST['brend'];
$ocena=$_POST['ocena'];
$pol=$_POST['pol'];

if(isset($_POST['id'])){
    $upit=$conn->prepare("UPDATE proizvodi set naziv=?, cena=?, ocena=?, opis=?, idpol=?, idkategorija=?, idakcija=?, idbrend=? WHERE idproizvod=?");
    $upit->execute([$naziv,$cena,$ocena,$opis,$pol,$kategorija,$akcija,$brend, $id]);


}

?>