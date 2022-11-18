<?php

include 'konekcija.php';
require "models/parfem.php";

$parfemId = trim($_POST['nazivParfema']);

if(Parfem::obrisi($parfemId, $conn)){
    echo true; 
}else{
    echo false;
}
