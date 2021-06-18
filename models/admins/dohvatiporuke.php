<?php

//dohvatanje poruka iz baze i ispis preko executeQuery funkcije()
require_once "config/connection.php";

$resenje6=executeeQuery("SELECT *FROM poruke p INNER JOIN korisnici k ON p.idkorisnik=k.idkorisnik ");



?>