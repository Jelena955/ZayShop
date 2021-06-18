<?php 

//brisanje iz korpe i prosledjivanje funkciji koja je napravljena za brisanje

include "../../models/admins/funkcijeadmins.php";
$id=$_POST['idnarudzbina'];
izbrisi('idnarudzbina', 'idnarudzbina', 'narudzbina', $id);





?>