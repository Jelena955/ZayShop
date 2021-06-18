<?php

//dohvatanje svih narudzbina

require_once "config/connection.php";

$narudzbine=executeeQuery("SELECT * from korpa k INNER JOIN narudzbina n ON k.idkorpa=n.idkorpa INNER JOIN korisnici ko ON k.idkorisnik=ko.idkorisnik INNER JOIN proizvodi p ON p.idproizvod=n.idproizvod WHERE k.izvrseno=1");


?>