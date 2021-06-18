<?php
//dohvatanje svih kategorija, polova, i proizvoda na akciji za ispis na side meniju za filtriranje

function getCategories(){
    return executeeQuery("SELECT * FROM kategorije");
}

function getGender(){
    return executeeQuery("SELECT * FROM pol");
}

function getSales(){
    return executeeQuery("SELECT * FROM proizvodi p INNER JOIN akcija a ON p.idakcija=a.idakcija WHERE a.vrednost='Yes'");
}












?>