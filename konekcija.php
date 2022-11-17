<?php

$conn = new mysqli("localhost", "root", "", "parfemi");

if ($conn->connect_errno){
    exit("Greska: ".$conn->connect_error);
}
?>