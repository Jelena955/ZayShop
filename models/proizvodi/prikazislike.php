<?php

include "funkcijeproizvodi.php";

proizvodid("SELECT * FROM proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON ps.idslika=s.idslika WHERE p.idproizvod=?");




?>




