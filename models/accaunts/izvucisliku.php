<?php 
session_start();
include "funkcijeaccounts.php";

//izvlacenje slike korisnika preko funkcije
if($_SESSION['uloga']=="1" || $_SESSION['uloga']=="2" ){


$idkorisnik=$_SESSION['korisnik'];
izvuciSliku($idkorisnik);}
    








?>