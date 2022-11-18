<?php

include 'konekcija.php';
require "models/parfem.php";

$naziv = trim($_POST['naziv']);
$kolicina = trim($_POST['kolicina']);
$cena = trim($_POST['cena']);
$brendId = trim($_POST['brend']);
$tipId = trim($_POST['tip']);

if(Parfem::dodaj($naziv, $kolicina, $cena, $brendId, $tipId, $conn)){
    echo true; 
}else{
    echo false;
}
