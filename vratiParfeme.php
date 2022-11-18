<?php

include 'konekcija.php';
require "models/parfem.php";

$parfemi = Parfem::vrati($conn);

foreach ($parfemi as $parfem) {
if($parfem->tipId=="1"){
            ?>  
             <option value="<?= $parfem->parfemId ?>"><td><?= "&#9792" . " " . $parfem->nazivParfema . " - " . $parfem->cena . " din" ?></td> 
             <?php
        }else{
            ?>   
            <option value="<?= $parfem->parfemId ?>"><td><?= "&#9794" . " " . $parfem->nazivParfema . " - " . $parfem->cena . " din" ?></td> 
            <?php
        }

}