<?php
include 'konekcija.php';
require "models/parfem.php";

$parfemId = trim($_POST['nazivParfema']);
$cena = trim($_POST['cena']);


if(Parfem::izmeni($parfemId, $cena, $conn)){
    echo true; 
}else{
    echo false;
}
