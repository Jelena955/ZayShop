<?php 

include "funkcijeproizvodi.php";
proizvodid("SELECT pv.idvelicina, v.ime as naziv FROM proizvodvelicina pv INNER JOIN velicina v ON pv.idvelicina=v.idvelicina where idproizvod=?  ")



?>