<?php

//upit za dohvatanje svih proizvoda i prosledjivanje funkciji executeQuery();
function getAllItems(){

    return executeeQuery("SELECT DISTINCT p.idproizvod, p.naziv as naziv, p.ocena as ocena, p.cena as cena, p.opis as opis, b.naziv as brend, ps.glavna as glavna, s.src as src FROM proizvodi p INNER JOIN proizvodslika ps ON p.idproizvod=ps.idproizvod INNER JOIN slika s ON s.idslika=ps.idslika INNER JOIN brend b ON p.idbrend=b.idbrend ");

    

}


?>